/**
 * КАРТА на странице с услугами
 */
 //if (true || window.location.pathname.match(/^\/(service|klinika)\//)) {
   if(document.getElementById('klinik-link-maps')){

    console.log("Тут нужна карта");

    document.getElementById("ymaps-api-loader").onerror = () => {
      throw new Error("YMaps loading error");
    };

//функция загрузки API карты

    function start_lazy_map() {
    console.log("Начинаю загружать карту");
    let map_loaded = false;		
		
        if (!map_loaded) {
            let map_block = document.getElementById('ymaps-api-loader');			
            map_loaded = true;
            map_block.setAttribute('src', 'https://api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&amp;amp;apikey=df578316-6785-45a9-beaa-8c9ad78839de');
            
            console.log("API карты загружен");
          }		
};

$pageID = $('.pageId').attr('data-attr');	

if( window.innerWidth < 768 && $pageID != 36205){   //не подгружать карту на главной странице в мобильной версии
	console.log(' ID страницы = ', $pageID);	
	setTimeout(start_lazy_map, 3500);		
  console.log("У вас смартфон, через 3 сенунды загружу карту");
  //start_lazy_map();
} else{

  let options_map = {
    once: true,//запуск один раз, и удаление наблюдателя сразу
    passive: true,
    capture: true
  };	

    console.log("У вас десктоп, загружу карту при наведении");
    let arr_map_klinik_link = document.querySelectorAll('#klinik-link-maps');
    Array.from(arr_map_klinik_link).forEach((item, index) => {
    item.addEventListener('mouseover', start_lazy_map, options_map);
    });
}

//функция формирования карты, после того, как она будет загружена
  $(document).ready(() => {
    if (!window.ymaps) {
      $("#ymaps-api-loader").on("load", (e) => {			
		 createMapOnLoad();				
      });
    } else {
      createMapOnLoad();	 
    }
  });

function createMapOnLoad() {
    console.log('Формирую карту');   
  let placemarkWrapper, placemarkConfig;

  const placemark = {
    imageSrc: "/wp-content/uploads/2020/11/clinic-logo.png",
    imageSize: 40,
  };
 
    //Placemark view configuration
    ymaps.ready(function () {
        placemarkWrapper = ymaps.templateLayoutFactory.createClass(
          '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        );
        placemarkConfig = {
          // Опции меток.
          // Необходимо указать данный тип макета.
          iconLayout: "default#imageWithContent",
          // Своё изображение иконки метки.
          iconImageHref: placemark.imageSrc,
          // Размеры метки.
          iconImageSize: [placemark.imageSize, placemark.imageSize],
          // Смещение левого верхнего угла иконки относительно
          // её "ножки" (точки привязки).
          iconImageOffset: [-placemark.imageSize / 2, -placemark.imageSize / 2],
          // Смещение слоя с содержимым относительно слоя с картинкой.
          iconContentOffset: [15, 15],
          // Макет содержимого.
          iconContentLayout: placemarkWrapper,
        };
      });

      const modal = $("#clinic_modal1");
      const mapWrapper = $("section.clinic-map", modal);
  
      const modalParts = {
        schedule: $(".modal__schedule-block", modal),
        phones: $(".modal__phones-block", modal),
        address: $(".modal__address-block", modal),
      };
  
      let isAllParts = !Object.values(modalParts).some((part) => !part[0]);

      
    /**
     * @function showModalBy
     * @description Функция выполняет отображение модального окна и его настройку в соответствии с вызывающим блоком
     * @param {HTMLLinkElement} source - элемент с которого выполняется открывание модельного окна (сслыка <a onclick="showModal(this)"...>), должен содержать атрибуты: data-placemark-coord (JSON: [Float, Float]), data-placemark-text, data-placemark-hint, data-schedule, data-phones (String: split by ','), data-address
     */
   
        
    window.showModalBy = function (source) {
     if (modal[0].map) modal[0].map.destroy();
    
     // alert ("Сработал Onclick (creae_map)");

      modal.modal("show");

      let placemarkDescriptor = {
        coord: JSON.parse(source.dataset.placemarkCoord),
        hint: source.dataset.placemarkHint,
        text: source.dataset.placemarkText,
      };

      if (isAllParts) {
        let clinicDescriptor = {
          schedule: source.dataset.schedule,
          address: source.dataset.address,
          phones: source.dataset.phones ?
            source.dataset.phones.split(",").map((p) => p.trim()) : null,
        };

        modalParts.schedule.html(clinicDescriptor.schedule);
        modalParts.address.html(clinicDescriptor.address);

        let singlePhoneBlock =
          modalParts.phones[0].firstElementChild || document.createElement("p");
        let phoneBlockInnerHTML = clinicDescriptor.phones
          .map((phone) => {
            let clone = singlePhoneBlock.cloneNode(true);
            if (clone.tagName == "A") {
              clone.href = "tel:" + phone;
            }
            clone.innerHTML = phone;
            return clone.outerHTML;
          })
          .join("<br>");

        modalParts.phones.html(phoneBlockInnerHTML);
      }

      ymaps.ready(function () {
        const mapConfig = {
          // Настройки карты
          // Координаты центра карты
          center: placemarkDescriptor.coord,
          // Масштаб карты
          zoom: 16,
        };
        modal[0].map = new ymaps.Map("modalMap", mapConfig);

        addPlacemarks(modal[0].map, [placemarkDescriptor], placemarkConfig);

        function addPlacemarks(map, placemarkDescriptors, placemarkConfig) {
          for (const placemarkDescriptor of placemarkDescriptors) {
            //Макет (оболочка) содержимого

            let newPlacemark = new ymaps.Placemark(
              placemarkDescriptor.coord, {
                hintContent: placemarkDescriptor.hint,
                balloonContent: placemarkDescriptor.text,
              },
              placemarkConfig
            );

            map.geoObjects.add(newPlacemark);
          }
        }
      });
    };
  }
}

