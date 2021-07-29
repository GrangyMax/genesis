/**
 * Карта на странице контактов
 */

$(document).ready(() => {
    if (!window.ymaps) {
        $('#ymaps-api-loader').on('load', e => {
            createMapOnLoad();
        });
    } else {
        createMapOnLoad();
    }

    function createMapOnLoad() {

        //Настройки карты
        const settings = {
            mapId: 'contacts-map',
            mapZoomMargin: 15,
            clinicBlockSelector: '.pricing-box',
            placemark: {
                imageSize: 40,
            },
        };

        let placemarkWrapper, placemarkConfig;
        //Placemark view configuration
        ymaps.ready(function () {
            placemarkWrapper = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            );
            placemarkConfig = {
                // Опции меток.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#imageWithContent',
                // Размеры метки.
                iconImageSize: [settings.placemark.imageSize, settings.placemark.imageSize],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-settings.placemark.imageSize / 2, -settings.placemark.imageSize / 2],
                // Смещение слоя с содержимым относительно слоя с картинкой.
                iconContentOffset: [15, 15],
                // Макет содержимого.
                iconContentLayout: placemarkWrapper
            };
        });

        const allClinicBlocks = document.querySelectorAll(settings.clinicBlockSelector);

        createAllPlacemarks(allClinicBlocks);

        /**
         * @function createAllPlacemarks
         * @description Функция выполняет создание всех меток на карте
         * @param {HTMLCollection} allClinicBlocks - все элементы клиник, каждый из которых должен содержать атрибуты: 
         * 1) data-placemark-coord (JSON: [Float, Float]);
         * 2) data-placemark-text;
         * 3) data-placemark-hint;
         * 4) data-placemark-image-src.
         */
        function createAllPlacemarks(allClinicBlocks) {
            let placemarkDescriptors = [];

            for (let clinicBlock of allClinicBlocks) {
                if (!(/^\[(\d+(\.\d+)?),\s*(\d+(\.\d+)?)\]$/.test(clinicBlock.dataset.placemarkCoord))) {
                    console.warn(`Invalid placemark-coord (${clinicBlock.dataset.placemarkCoord}).`, clinicBlock);
                    continue;
                }
                let placemarkDescriptor = {
                    coord: JSON.parse(clinicBlock.dataset.placemarkCoord),
                    hint: clinicBlock.dataset.placemarkHint,
                    text: clinicBlock.dataset.placemarkText,
                    image: clinicBlock.dataset.placemarkImageSrc,
                };
                placemarkDescriptors.push(placemarkDescriptor);
            }

            const coords = placemarkDescriptors.map(pD => pD.coord);
            coords.x = coords.map(v => v[0]);
            coords.y = coords.map(v => v[1]);
            coords.min = {
                x: Math.min(...coords.x),
                y: Math.min(...coords.y),
            };
            coords.max = {
                x: Math.max(...coords.x),
                y: Math.max(...coords.y),
            };

            //((-90, 90), (-180, 180)) => (180, 360)

            //Содержимое выполнится после загрузки Yandex Maps API
            ymaps.ready(function () {
                const $map = $(`#${settings.mapId}`);

                //center and zoom config
                const mapConfig =
                    ymaps.util.bounds.getCenterAndZoom(
                        [[coords.min.x, coords.min.y], [coords.max.x, coords.max.y]],
                        [$map.width(), $map.height()],
                    );

                //Создаём карту
                let map = window.contactsMap = new ymaps.Map($map[0], mapConfig, {
                    searchControlProvider: 'yandex#search',
                });

                let objectManager = window.mapObjectManager = new ymaps.ObjectManager({
                    // Чтобы метки начали кластеризоваться, выставляем опцию.
                    clusterize: true,
                    // ObjectManager принимает те же опции, что и кластеризатор.
                    gridSize: settings.placemark.imageSize,
                    zoomMargin: 128
                });

                // Чтобы задать опции одиночным объектам и кластерам,
                // обратимся к дочерним коллекциям ObjectManager.
                objectManager.clusters.options.set({ preset: 'islands#orangeClusterIcons' });
                map.geoObjects.add(objectManager);

                //Добавить все метки на карту
                addPlacemarks(objectManager, placemarkDescriptors, placemarkConfig);

                function addPlacemarks(objectManager, placemarkDescriptors, placemarkConfig) {
                    let id = 0;
                    for (const placemarkDescriptor of placemarkDescriptors) {
                        //Изменение картинки для метки
                        placemarkConfig.iconImageHref = placemarkDescriptor.image;

                        //Создание метки
                        let newPlacemark = {
                            type: 'Feature',
                            id: id++,
                            geometry: {
                                type: 'Point',
                                coordinates: placemarkDescriptor.coord,
                            },
                            properties: {
                                hintContent: placemarkDescriptor.hint,
                                balloonContent: placemarkDescriptor.text,
                                clusterCaption: placemarkDescriptor.hint,
                            },
                            options: placemarkConfig
                        };

                        //Помещение метки на карту
                        objectManager.add(newPlacemark);
                    }
                }
            });
        };
    }
});