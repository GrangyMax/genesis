$(document).ready(() => {
  /**
   * Выпадающие списки на странице услуг лаборатории
   */

  // <РАБОТА С СЕРВЕРОМ>
  const BACKEND = '/wp-admin/admin-ajax.php';
  async function getServicesHTML(count, actionName, elementId, customQueryBody) {
    let json = await getJSONFromDB(count, actionName, elementId, customQueryBody);
    return buildServicesByJSON(json);

    async function getJSONFromDB(count, actionName, elementId, customQueryBody) {
      let queryBody;
      if (customQueryBody) {
        queryBody = customQueryBody;
      } else {
        queryBody = `count=${count}&action=${actionName}`;
        if (elementId) queryBody += `&id=${elementId}`;
      }
      console.log(`QUERY: ${BACKEND}:POST => ${queryBody}`);
      const result = await fetch(BACKEND, {
        method: 'POST',
        body: queryBody,
        headers: {
          'Content-type': 'application/x-www-form-urlencoded'
        }
      });
      //ответ в формате JSON и содержит описание каждой услуги входящие в запрошенные группы
      //формат информации в json файле:
      /*
      [{
          price: int
          title: string
          description: string
          serviceLink: string
          isHomeVisit: boolean
          isStock: boolean
      }, {...}, {...}, ...]
      */
      let json;
      try {
        json = await result.clone().json();
      } catch (err) {
        console.warn(`Error: When parsing JSON from server (${BACKEND}): \n`, (await result.text()).slice(0, 100) + '...');
        console.warn('Using default JSON');
        json = [{
            price: 1500,
            title: 'title 1',
            description: 'description1',
            serviceLink: '#',
            isHomeVisit: true,
            isStock: true
          },
          {
            price: 2750,
            title: 'title 2',
            description: 'description2',
            serviceLink: '#',
            isHomeVisit: false,
            isStock: true
          },
          {
            price: 1000,
            title: 'title 3',
            description: 'description3',
            serviceLink: '#',
            isHomeVisit: true,
            isStock: false
          },
          {
            price: 9500,
            title: 'title 4',
            description: 'description4',
            serviceLink: '#',
            isHomeVisit: false,
            isStock: false
          },
          {
            price: 3000,
            title: 'title 5',
            description: 'description5',
            serviceLink: '#',
            isHomeVisit: true,
            isStock: true
          },
        ];
      }
      return json;
    }

    function buildServicesByJSON(json) {
      if (!json) return null;

      let result = '';
      for (const service of json) {
        result += `
          <a href="${service.serviceLink}"
            class="list-group-item list-group-item-action flex-column align-items-start block-lab pt-1">
            <div class="pr-2 pl-2">
                <div class="d-flex w-100 justify-content-between block-title-lab pt-3">
                    <h3 class="lab-tabs__title mb-2 text-blue">
                        <i class="block-title-lab"></i>
                        ${service.title}
                    </h3>
                </div>
                <p class="mb-2 block-short-lab" >${service.description}</p>
            </div>`;

        if (service.isHomeVisit) result += `
                <small class="iconlab-page"><i class="icon-car"></i> Возможен выезд на дом</small>`;
        if (service.isStock) result += `
                <small class="iconlab-page-red"><i class="icon-gift"></i> Акция</small>`;

        result += `
            <div class="lab-tabs__foot row p-2 pt-0 pb-0">
            <span class="col pt-1 pb-2">
                Цена: 
                <span class="lab-tabs__price">${formatPrice(service.price)}</span>
            </span>
            <span class="col-auto pt-1 pb-2">
                <small class="lab-more">Подробнее</small>
            </span>
          </div>
        </a>`;
      }
      return result;

      function formatPrice(price) {
        if (price == '0') return 'Уточняйте';
        let priceRexexp = /^\d+(\s?\-\s?\d+)?$/;
        if (!priceRexexp.test(price))
          return price ? price : 'Уточняйте';
        let resParts = [];
        (price.toString()).split('-').forEach(part => {
          part = part.trim();
          let newPart = '',
            partLen = part.length;
          for (let i = partLen - 1; i > -1; i--) {
            if ((partLen - i) % 3 != 0) {
              newPart += part[i];
            } else {
              newPart += part[i] + ' ';
            }
          }
          resParts.push(newPart.split('').reverse().join('') + RUBLE);
        });
        return `<span class="format-price">${resParts.join(' - ')}</span>`;
      }
    }
  }
  // </РАБОТА С СЕРВЕРОМ>

  const loadManager = {
    search: {
      action: 'lab_search',
      searchString: '',
      counter: 1,
      refresh(searchString) {
        this.searchString = searchString;
        this.counter = 1;
      },
      increment() {
        this.counter++;
      },
      async getHTML() {
        console.log(`Searching HTML by loadManager: { counter: ${this.counter}, action: ${this.action}, search: ${this.searchString} }`);
        return await getServicesHTML('', '', '', `count=${this.counter}&action=${this.action}&search=${this.searchString}`);
      }
    },
    tabs: {
      action: 'labs_start',
      id: 0,
      counter: 1,
      refresh(actionName, elementId) {
        this.action = actionName;
        this.id = elementId || '';
        this.counter = 1;
      },
      increment() {
        this.counter++;
      },
      async getHTML() {
        console.log(`Getting HTML by loadManager: { counter: ${this.counter}, action: ${this.action}, id: ${this.id} }`);
        return await getServicesHTML(this.counter, this.action, this.id);
      },
    },
  };

  const animationSpeed = "slow";

  // Закрываем все вкладки при загрузке
  $('.service-tab__content').each(function () {
    $(this).hide();
  });

  // Корневые элементы вкладок (врапперы)
  const serviceRoots = $('.service-tab_root').toArray();

  const $tabContainer = $('.tab-container'); // враппе вывода
  const $serviceTabsBlock = $('.service-tabs-block'); // блок с вкладками
  const $tabOutput = $tabContainer.find('.list-group.blocks-lab'); // непосредственный блок вывода

  // элементы с гифками загрузки и подгрузки
  const $preloaders = {
    main: $tabContainer.find('.preloader-main'),
    bottom: $tabContainer.find('.preloader-bottom')
  };

  // Элемент определяющий что конец скролла и надо подгрузить ещё
  const tabEndObserver = new IntersectionObserver(function (entries) {
    if (entries[0].isIntersecting === true) {
      console.log(`Last load number: ${window.loadEndNumber}`);
      loadMoreTabData();
    }
  }, {
    threshold: [1]
  });
  tabEndObserver.observe($preloaders.bottom[0]);

  for (const root of serviceRoots) {
    root.tabs = Array.from(root.querySelectorAll('.service-tab'));
    root.content = root.querySelector('.service-tab__content');
    $(root).click(e => {
      if (window.lastRootTab == root) {
        toggleRootTab(root);
        return;
      }
      if (window.lastRootTab) {
        collapseRootTab(lastRootTab);
      }
      expandRootTab(root);
    });

    for (const tab of root.tabs) {
      $(tab).click(e => {
        e.stopPropagation();
        if (window.lastSelectedTab == tab) {
          toggleTab(tab);
          return;
        }
        if (window.lastSelectedTab) {
          unselectTab(lastSelectedTab);
        }
        selectTab(tab);
      });
    }
  }

  // АПИ загрузки данных для вкладок
  async function loadTabData(actionName = 'labs_start', elementId = '') {
    $tabOutput.hide();
    $preloaders.bottom.hide();
    $preloaders.main.fadeIn(animationSpeed);

    loadManager.tabs.refresh(actionName, elementId);
    const servicesHTML = await loadManager.tabs.getHTML();

    $preloaders.main.hide();
    $tabOutput.html(servicesHTML);
    $preloaders.bottom.show();
    $tabOutput.fadeIn(animationSpeed);
  }
  async function loadMoreTabData() {
    loadManager.tabs.increment();
    const servicesHTML = await loadManager.tabs.getHTML();
    //debugger;
    if (servicesHTML) {
      const resultBlock = $('<div class="list-group" style="display: none"></div>').html(servicesHTML);
      $tabOutput.append(resultBlock);
      resultBlock.slideDown(animationSpeed);
    } else {
      $preloaders.bottom.fadeOut(animationSpeed);
    }
  }

  // АПИ корневых вкладок
  async function expandRootTab(tab) {
    $(tab).addClass('service-tab_active');
    $(tab.content).slideDown(animationSpeed);
    let title = $('.service-tab__title', tab)[0];
    window.lastRootTab = tab;
    tab.expanded = true;

    await loadTabData(title.dataset.action);
  }
  async function collapseRootTab(tab) {
    $(tab).removeClass('service-tab_active');
    $(tab.content).slideUp(animationSpeed);
    tab.expanded = false;
    if (window.lastRootTab == tab) window.lastRootTab = null;

    if (window.lastSelectedTab) {
      await unselectTab(lastSelectedTab);
    }
  }
  async function toggleRootTab(tab) {
    if (tab.expanded) {
      await collapseRootTab(tab);
      await loadTabData();
    } else expandRootTab(tab);
  }

  // АПИ внутренних вкладок
  async function selectTab(tab) {
    $(tab).addClass('service-tab__service-single_active');
    window.lastSelectedTab = tab;
    tab.selected = true;

    await loadTabData(loadManager.tabs.action, tab.dataset.actionId);
  }
  async function unselectTab(tab) {
    $(tab).removeClass('service-tab__service-single_active');
    tab.selected = false;
    if (window.lastSelectedTab == tab) window.lastSelectedTab = null;
  }
  async function toggleTab(tab) {
    if (tab.selected) {
      await unselectTab(tab);
      await loadTabData(loadManager.tabs.action);
    } else await selectTab(tab);
  }

  /**
   * Поиск услуг лаборатории
   */
  const $searchField = $('.js-search-block-lab');
  const $searchResultBlock = $('.search-result-block'); // корневой элемент (враппер)
  const $searchOutput = $searchResultBlock.find('.list-group.blocks-lab'); // непосредственно блок вывода

  // элементы с гифками подгрузки данных
  const $searchPreloaders = {
    main: $searchResultBlock.find('.preloader-main'),
    bottom: $searchResultBlock.find('.preloader-bottom'),
  };

  const searchEndObserver = new IntersectionObserver(function (entries) {
    if (entries[0].isIntersecting === true) {
      console.log(`Last load number: ${window.loadEndNumber}`);
      findMoreServices($searchField.val());
    }
  }, {
    threshold: [1]
  });
  searchEndObserver.observe($searchPreloaders.bottom[0]);

  let requestTimeout = null;
  $searchField.on('keyup', e => {
    if (requestTimeout) clearTimeout(requestTimeout);
    requestTimeout = setTimeout(() => findServices($searchField.val()), 500);
  });

  // АПИ загрузки данных поиска
  async function findServices(queryString) {
    queryString = queryString.trim();

    if (!queryString) { // если поле поиска пустое, то показываем блок с вкладками
      $searchPreloaders.main.show();
      $tabContainer.fadeIn(animationSpeed);
      $serviceTabsBlock.fadeIn(animationSpeed);

      $searchResultBlock.hide();
      $searchOutput.hide();
      $searchPreloaders.bottom.hide();
      return;
    }

    // else
    $searchPreloaders.main.show();
    $searchPreloaders.bottom.hide();
    $serviceTabsBlock.hide();
    $tabContainer.hide();
    $searchResultBlock.show();
    $searchOutput.slideUp(animationSpeed);

    loadManager.search.refresh(queryString);
    let servicesHTML = await loadManager.search.getHTML();

    if (!servicesHTML) {
      servicesHTML = '<center>По вашему запросу ничего не найдено</center>';
    } else {
      $searchPreloaders.bottom.show();
    }

    $searchPreloaders.main.hide();
    $searchOutput.html(servicesHTML);
    $searchOutput.slideDown(animationSpeed);
  }
  async function findMoreServices() {
    loadManager.search.increment();
    let servicesHTML = await loadManager.search.getHTML();

    if (!servicesHTML) {
      $searchPreloaders.bottom.slideUp(animationSpeed);
      return;
    }

    const resultBlock = $('<div class="list-group" style="display: none"></div>').html(servicesHTML);
    $searchOutput.append(resultBlock);
    resultBlock.slideDown(animationSpeed);
  }
});