<?php /* Template Name: График-работы-врачей */ ?>

<?php get_header();
set_query_var('title', 'График приема врачей');
/*set_query_var('subtitle',  'График приема врачей клиник Генезис');*/
get_template_part('parts/breadcrumbs'); ?>

<div class="container license-page">
  <div id="accordion">

    <!--LEVEL 1-------  ООО "Клиника Генезис"--------------------------------------------------------------------------------------------------------------->
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn_grafic_priema btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">					   
			<img src="/wp-content/uploads/2020/12/мнпроф-центр.png" class="img_grafic_priema" >
			<span class="title_grafic_priema">Многофункционального центра, ул. Семашко, 4А</span>
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">        					
		<input class="form-control" type="text" placeholder="Введите направление или фамилию врача" id="search-text1" onkeyup="tableSearch1()">
		<div class="table-container">
			<table class="table table-striped timetable table-hover" id="info-table1" border="1">
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Направление</th>
						<th>ПН</th>
						<th>ВТ</th>
						<th>СР</th>
						<th>ЧТ</th>
						<th>ПТ</th>
						<th>СБ</th>
						<th>ВС</th>
					</tr>
					
					
				</thead>
				<tbody>
				
					<tr>
						<td>Копылов Михаил Павлович</td>
						<td>Гастроэнтеролог-эндоскопист</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Конопелько  Виктория Евгеньевна</td>
						<td>Гастроэнтеролог</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Кляритская Ирина Львовна</td>
						<td>Гастроэнтеролог</td>
						<td></td>
						<td></td>
						<td></td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Костюкова Елена Андреевна</td>
						<td>Гастроэнтеролог. Пульмонолог</td>
						<td>15.00-<br>18.00</td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Цапяк Татьяна Анатольевна</td>
						<td>Гастроэнтеролог</td>
						<td></td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Ефетова Тамара Павловна</td>
						<td>Гинеколог</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>			
					
					<tr>
						<td>Пожарищенская Татьяна Григорьевна	</td>
						<td>Гинеколог</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Геращенко Елена Геннадьевна</td>
						<td>Гинеколог</td>
						<td>09.00-<br>15.30</td>
						<td></td>
						<td></td>
						<td>09.00-<br>15.30</td>
						<td>09.00-<br>15.30</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Аникин Сергей Сергеевич</td>
						<td>Гинеколог</td>
						<td>14.30-<br>18.00</td>
						<td>14.00-<br>18.00</td>
						<td>14.00-<br>18.00</td>
						<td>09.00-<br>14.00</td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
								
					
					<tr>
						<td>Мамоненко Инна Юрьевна</td>
						<td>Гинеколог</td>
						<td>13.00-<br>18.00</td>
						<td>09.00-<br>15.00</td>
						<td>12.00-<br>18.00</td>
						<td>09.00-<br>13.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Елшина Ирина Юрьевна</td>
						<td>Дерматовенеролог</td>
						<td>09.00-<br>14.00</td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td>09.00-<br>14.00</td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
									
					<tr>
						<td>Грядовая Валентина Степановна</td>
						<td>Дерматовенеролог</td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Прохоров Дмитрий Валерьевич</td>
						<td>Дерматовенеролог</td>
						<td></td>
						<td>14.30-<br>17.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
										

					<tr>
						<td>Цикуришвили Юлия Олеговна</td>
						<td>Дерматовенеролог</td>
						<td></td>
						<td></td>
						<td>09.00-<br>11.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
						
					<tr>
						<td>Киричек Сергей Петрович</td>
						<td>Кардиолог</td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Лутай Юлия Александровна</td>
						<td>Кардиолог</td>
						<td>15.00-<br>17.00</td>
						<td></td>
						<td>15.00-<br>17.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Сержантов Максим Анатольевич</td>
						<td>Кардиолог</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Ульянова Наталия Юрьевна</td>
						<td>Терапевт, кардиолог</td>
						<td>09.00-<br>11.00</td>
						<td>11.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
				
					
							
					<tr>
						<td>Беспалова Таисия Владиславовна</td>
						<td>Терапевт</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td></td>
						<td></td>
					</tr>
					
						
				
					
					<tr>					
						<td>Леонова Наталья Александровна</td>
						<td>Терапевт</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td>09.00-<br>14.30</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Лугачев Богдан Игоревич</td>
						<td>Пульмонолог</td>
						<td></td>
						<td></td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Сидоренков Александр Валериевич</td>
						<td>Гематолог, врач ультразвуковой диагностики</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr> 
					
					<tr>					
						<td>Амдиев Алим Анварович</td>
						<td>Гематолог</td>
						<td></td>
						<td>10.00-<br>13.00</td>
						<td>10.00-<br>13.00</td>
						<td>10.00-<br>13.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Короленко Татьяна Сергеевна</td>
						<td>Гематолог</td>
						<td>09.00-<br>11.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>11.00</td>
						<td>09.00-<br>11.00</td>
						<td>09.00-<br>11.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>					
						<td>Малинина Яна Вячеславовна</td>
						<td>Невролог</td>
						<td>09.30-<br>15.00</td>
						<td>09.30-<br>15.00</td>
						<td>09.30-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
				
										
					<tr>					
						<td>Сеитаблаева Диляра Ремзиевна</td>
						<td>Невролог</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
				
					<tr>					
						<td>Хохлова Элла Анатольевна</td>
						<td>Невролог</td>
						<td>10.00-<br>18.00</td>
						<td>10.00-<br>18.00</td>
						<td>10.00-<br>18.00</td>
						<td>10.00-<br>18.00</td>
						<td>10.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
					
						
					<tr>					
						<td>Елисеев Сергей Львович</td>
						<td>Ортопед-артролог</td>
						<td>10.00-<br>14.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td>10.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Куликов Иван Владимирович</td>
						<td>Ортопед-артролог</td>
						<td>10.00-<br>15.30</td>
						<td></td>
						<td></td>
						<td>10.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Борисов Игорь Леонидович</td>
						<td>Ортопед-артролог</td>
						<td>12.00-<br>15.00</td>
						<td></td>
						<td>09.30-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Заричный Алексей Владимирович</td>
						<td>Ортопед-артролог</td>
						<td></td>
						<td>10.00-<br>15.30</td>
						<td></td>
						<td>12.00-<br>15.30</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Кузнецов Максим Александрович</td>
						<td>Ортопед-артролог</td>
						<td></td>
						<td>10.00-<br>14.00</td>
						<td>10.00-<br>14.00</td>
						<td>09.00-<br>11.30</td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Ипатенко Владислав Геннадиевич</td>
						<td>Ортопед-травматолог</td>
						<td>09.00-<br>12.00<br><br>15.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td>08.00-<br>09.00<br><br>15.00-<br>16.00</td>
						<td>10.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>	
														
					<tr>					
						<td>Дышловой Валериан Николаевич</td>
						<td>Нейрохирург</td>
						<td>09.00-<br>12.00</td>
						<td>09.00-<br>12.00</td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
					</tr>					
										
					<tr>					
						<td>Заяева Анна Анатольевна</td>
						<td>Ревматолог</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>09.00-<br>12.00</td>
						<td></td>
					</tr>					
					
					
					<tr>					
						<td>Чернышенко Сергей Владимирович</td>
						<td>Оториноларинголог</td>
						<td>12.00-<br>14.00</td>
						<td></td>
						<td>12.00-<br>14.00</td>
						<td></td>
						<td>12.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>	
											
					
					<tr>					
						<td>Дурягина Татьяна Александровна</td>
						<td>Оториноларинголог</td>
						<td>08.00-<br>11.00</td>
						<td>14.00-<br>17.00</td>
						<td>08.00-<br>11.00</td>
						<td>08.00-<br>11.00</td>
						<td>08.00-<br>11.00</td>
						<td></td>
						<td></td>
					</tr>					
					
					<tr>					
						<td>Турчанинов Андрей Павлович</td>
						<td>Оториноларинголог</td>
						<td>08.00-<br>11.00</td>
						<td>08.00-<br>11.00</td>
						<td>08.00-<br>11.00</td>
						<td>08.00-<br>11.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>					
										
					<tr>					
						<td>Чалых Ксения Игоревна</td>
						<td>Оториноларинголог</td>
						<td>12.00-<br>16.00</td>
						<td>12.00-<br>16.00</td>
						<td>12.00-<br>16.00</td>
						<td>12.00-<br>16.00</td>
						<td>12.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>	

					<tr>					
						<td>Семченко Наталья Ивановна</td>
						<td>Офтальмолог</td>
						<td>09.00-<br>15.30</td>
						<td>09.00-<br>15.30</td>
						<td>09.00-<br>15.30</td>
						<td>09.00-<br>15.30</td>
						<td>09.00-<br>15.30</td>
						<td></td>
						<td></td>
					</tr>					
											
					<tr>					
						<td>Горбатюк Вадим Владимирович</td>
						<td>УЗД</td>
						<td>08.00-<br>14.00</td>
						<td>08.00-<br>14.00</td>
						<td>08.00-<br>14.00</td>
						<td>08.00-<br>14.00</td>
						<td>08.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Желябина Наталья Викторовна</td>
						<td>УЗД</td>
						<td>14.40-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Яковлева Лина Александровна</td>
						<td>УЗД</td>
						<td>14.00-<br>18.00</td>
						<td>09.00-<br>16.00</td>
						<td>14.00-<br>18.00</td>
						<td>09.00-<br>16.00</td>
						<td>14.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Регушевская Екатерина Игоревна</td>
						<td>УЗД</td>
						<td>08.30-<br>14.00</td>
						<td>14.00-<br>18.00</td>
						<td>08.30-<br>15.00</td>
						<td>14.00-<br>18.00</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Беликова Ольга Николаевна</td>
						<td>УЗД</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
								
					<tr>					
						<td>Турна Эльвира Юсуфовна</td>
						<td>УЗД сердца, Кардиолог</td>
						<td></td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td></td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Кожанова Татьяна Александровна</td>
						<td>УЗД сердца</td>
						<td>14.20-<br>16.00</td>
						<td></td>
						<td></td>
						<td>14.20-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
						
					<tr>					
						<td>Сыч Мария Владимировна</td>
						<td>УЗД сердца</td>
						<td>10.00-<br>13.00</td>
						<td></td>
						<td></td>
						<td>10.00-<br>13.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Павловский Юрий Эдуардович</td>
						<td>УЗД</td>
						<td>15.00-<br>18.00</td>
						<td>15.00-<br>18.00</td>
						<td>15.00-<br>18.00</td>
						<td>15.00-<br>18.00</td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>					
						<td>Осипов Юрий Александрович</td>
						<td>Уролог</td>
						<td>09.00-<br>12.00</td>
						<td>09.00-<br>14.00</td>
						<td>09.00-<br>14.00</td>
						<td>09.00-<br>12.00</td>
						<td>09.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Свирский Александр Александрович</td>
						<td>Уролог</td>
						<td>09.00-<br>14.00</td>
						<td>09.00-<br>14.00</td>
						<td>14.00-<br>16.00</td>
						<td>09.00-<br>14.00</td>
						<td>13.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
				
					<tr>					
						<td>Селезнев Вадим Олегович</td>
						<td>Уролог</td>
						<td>14.00-<br>16.00</td>
						<td>14.00-<br>16.00</td>
						<td>09.00-<br>14.00</td>
						<td>14.00-<br>16.00</td>
						<td>09.00-<br>13.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Анисимова Ольга Михайловна</td>
						<td>Нефролог</td>
						<td>09.00-<br>13.00</td>
						<td>09.00-<br>13.00</td>
						<td>09.00-<br>13.00</td>
						<td></td>
						<td>09.00-<br>13.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Ульянов Андрей Александрович</td>
						<td>Проктолог</td>
						<td>09.30-<br>16.00</td>
						<td>09.30-<br>16.00</td>
						<td></td>
						<td>09.30-<br>16.00</td>
						<td>09.30-<br>16.0</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Карпова Светлана Борисовна</td>
						<td></td>
						<td></td>
						<td></td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						
					</tr>
					
					<tr>					
						<td>Белоконь Алексей Юрьевич</td>
						<td>Хирург</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Дубовенко Виктор Владимирович</td>
						<td>Хирург</td>
						<td>11.00-<br>13.00</td>
						<td>12.00-<br>15.00</td>
						<td>12.00-<br>15.00</td>
						<td>12.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Чемодуров Николай Трофимович</td>
						<td>Хирург</td>
						<td></td>
						<td>09.00-<br>13.00</td>
						<td></td>
						<td>09.00-<br>13.00</td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Моров Александр Викторович</td>
						<td>Хирург</td>
						<td>10.00-<br>14.00</td>
						<td>12.00-<br>14.45</td>
						<td>12.00-<br>14.45</td>
						<td>12.00-<br>14.45</td>
						<td>10.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Гюльмамедов Салман Ибрагимович</td>
						<td>Хирург</td>
						<td>12.00-<br>13.00</td>
						<td>11.00-<br>12.00</td>
						<td>11.00-<br>12.00</td>
						<td>11.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Цатурян Александр Борисович</td>
						<td>Сосудистый хирург</td>
						<td></td>
						<td>15.00-<br>17.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Чаленко Виктория Анатольевна</td>
						<td>Сосудистый хирург</td>
						<td>10.00-<br>14.00</td>
						<td>10.00-<br>14.00</td>
						<td>10.00-<br>14.00</td>
						<td>10.00-<br>14.00</td>
						<td>10.00-<br>14.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Жданюк Леонид Александрович</td>
						<td>Сосудистый хирург</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Шкрадюк Александр Викторович</td>
						<td>Онколог</td>
						<td>10.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Перминов Алексей Александрович</td>
						<td>Хирург</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Мирошник Артем Владимирович	</td>
						<td>Хирург</td>
						<td>09.00-<br>13.00</td>
						<td></td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Золотилов Артем Евгеньевич</td>
						<td>Хирург</td>
						<td>13.00-<br>15.00</td>
						<td>13.00-<br>15.00</td>
						<td>13.00-<br>15.00</td>
						<td>13.00-<br>15.00</td>
						<td>13.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Расулов Нафе Анвар-Оглу</td>
						<td>Хирург</td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Крючков Дмитрий Юрьевич</td>
						<td>Пластический хирург</td>
						<td></td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Джерелей Андрей Александрович</td>
						<td>Пластический хирург</td>
						<td></td>
						<td></td>
						<td>15.00-<br>17.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Малиенко Марина Эдуардовна</td>
						<td>Эндокринолог</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>					
						<td>Полянских Ольга Анатольевна</td>
						<td>Аллерголог</td>
						<td></td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td>09.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>					
						<td>Пищенкова Дарья Вячеславовна</td>
						<td>Эпилептолог</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>09.00-<br>13.00</td>
						<td></td>
					</tr>
										
				</tbody>
			</table>   
			</div>



        </div>
      </div>
    </div>	
    <!--LEVEL 1------- конец  ООО " Клиника Генезис"--------------------------------------------------------------------------------------------------------------->
	

		  
   <!--LEVEL 1-------  специалисты детской клиники""--------------------------------------------------------------------------------------------------------------->
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn_grafic_priema btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <img src="/wp-content/uploads/2020/12/мнпроф-центр.png" class="img_grafic_priema" >  
		  <span class="title_grafic_priema">Детского отделения, ул. Семашко, 4А</span>
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">

      
	    	<input class="form-control" type="text" placeholder="Введите направление или фамилию врача" id="search-text2" onkeyup="tableSearch2()">
			<div class="table-container">
			<table class="timetable table table-striped" id="info-table2" border="1">
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Направление</th>
						<th>ПН</th>
						<th>ВТ</th>
						<th>СР</th>
						<th>ЧТ</th>
						<th>ПТ</th>
						<th>СБ</th>
						<th>ВС</th>
					</tr>
								
					
				</thead>
				<tbody>
				
					<tr>
						<td>Полянских О. А.</td>
						<td>Аллерголог</td>
						<td>9.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td>9.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Фистель Б. Э.</td>
						<td>Невролог</td>
						<td></td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Сафина Г. И.</td>
						<td>Педиатр</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
										
					<tr>
						<td>Лавринова Ю. Н.</td>
						<td>Педиатр</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>9.00-<br>13.00</td>
						<td></td>
					</tr>
					
					<tr>
						<td>Еремко С. С.</td>
						<td>Ортопед</td>
						<td>13.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Сухарева Г. Э.</td>
						<td>Кардиолог</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>10.00-<br>12.00</td>
						<td></td>
					</tr>
					
					<tr>
						<td>Писаренко А. С.	</td>
						<td>Эндокринолог</td>
						<td></td>
						<td>15.00-<br>16.00</td>
						<td></td>
						<td>15.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
														
					<tr>
						<td>Фурсова Е. П.</td>
						<td>УЗИ</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Дурягина Т. А.</td>
						<td>ЛОР</td>
						<td>11.00-<br>13.00</td>
						<td>11.00-<br>14.00</td>
						<td>8.00-<br>12.00</td>
						<td>11.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Рамазанов Э. Н.</td>
						<td>ЛОР</td>
						<td>13.00-<br>15.00</td>
						<td>9.00-<br>11.00</td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td>9.00-<br>11.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Соловых А. Г.</td>
						<td>ЛОР</td>
						<td></td>
						<td></td>
						<td>11.00-<br>16.00</td>
						<td></td>
						<td>11.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Дубский А. В.</td>
						<td>Невролог</td>
						<td>14.00-<br>18.00</td>
						<td>14.00-<br>18.00</td>
						<td>14.00-<br>18.00</td>
						<td>8.00-<br>13.00</td>
						<td>14.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Бондарева О. Б.	</td>
						<td>Педиатр	</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Бондарева О. Б.	</td>
						<td>Педиатр	</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Кадыров Р. М.</td>
						<td>Отоларинголог</td>
						<td></td>
						<td></td>
						<td>16.00-<br>17.00</td>
						<td></td>
						<td>16.00-<br>17.00</td>
						<td></td>
						<td></td>
					</tr>
					
					
				</tbody>
			</table>   
	</div>


        </div>
      </div>
    </div>
    <!--LEVEL 1-------  конец специалисты детской клиники ""--------------------------------------------------------------------------------------------------------------->


   <!--LEVEL 1------- детской клиники пр. Победы, 99 ""--------------------------------------------------------------------------------------------------------------->
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn_grafic_priema btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			    <img src="/wp-content/uploads/2020/12/детская-кл-ка.png" class="img_grafic_priema" > 
				<span class="title_grafic_priema">Детской клиники на пр. Победы, 99</span>

          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">

      
			
	    	<input class="form-control" type="text" placeholder="Введите направление или фамилию врача" id="search-text3" onkeyup="tableSearch3()">
			<div class="table-container">
			<table class="timetable table table-striped" id="info-table3" border=1>
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Направление</th>
						<th>ПН</th>
						<th>ВТ</th>
						<th>СР</th>
						<th>ЧТ</th>
						<th>ПТ</th>
						<th>СБ</th>
						<th>ВС</th>
					</tr>
								
					
				</thead>
				<tbody>
				
					<tr>
						<td>Полянских Ольга Анатольевна</td>
						<td>Аллерголог-иммунолог</td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td>9.00-<br>15.00</td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Воробьева  Мария Юрьевна</td>
						<td>Иммунолог</td>
						<td>15.00-<br>17.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Братчик Оксана Владимировна</td>
						<td>Детский Гастроэнтеролог</td>
						<td>13.00-<br>16.00</td>
						<td></td>
						<td>13.00-<br>16.00</td>
						<td></td>
						<td>13.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
				
					<tr>
						<td>Абдураманова Зульфа Февзиевна</td>
						<td>Детский Гинеколог</td>
						<td>14.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td>10.30-<br>13.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Куркова Татьяна Евгеньевна</td>
						<td>Детский Дерматолог</td>
						<td>16.20-<br>18.00</td>
						<td>16.20-<br>18.00</td>
						<td></td>
						<td>16.20-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				
				
					<tr>
						<td>Джемилева Гульнара Ахтемовна</td>
						<td>Детский Кардиолог</td>
						<td></td>
						<td>16.30-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Левит Артур Яковлевич</td>
						<td>Детский Кардиолог</td>
						<td>14.20-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Дубский Александр Валерьянович</td>
						<td>Детский Невропатолог</td>
						<td>14.00-<br>18.00</td>
						<td>14.00-<br>18.00</td>
						<td>14.00-<br>18.00</td>
						<td>8.00-<br>13.00</td>
						<td>14.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Фистель Белла Эммануиловна</td>
						<td>Детский Невропатолог</td>
						<td>8.15-<br>11.00</td>
						<td></td>
						<td>14.30-<br>16.00</td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
						
					<tr>
						<td>Никифорова Ирина Борисовна</td>
						<td>Детский Отоларинголог</td>
						<td>08.30-<br>15.00</td>
						<td>08.30-<br>15.00</td>
						<td>08.30-<br>15.00</td>
						<td>08.30-<br>15.00</td>
						<td>08.30-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Дурягина Татьяна Александровна</td>
						<td>Детский Отоларинголог</td>
						<td>11.00-<br>13.00</td>
						<td>11.00-<br>15.00</td>
						<td>11.00-<br>14.30</td>
						<td>11.00-<br>14.30</td>
						<td>11.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Пинчук Анастасия Алексеевна</td>
						<td>Детский Отоларинголог</td>
						<td></td>
						<td>15.30-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Михальченко Анна Михайловна</td>
						<td>Детский Отоларинголог</td>
						<td>15.20-<br>18.00</td>
						<td></td>
						<td></td>
						<td>15.20-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Онищенко Зоя Владимировна</td>
						<td>Детский Окулист</td>
						<td>16.30-<br>18.00</td>
						<td>16.30-<br>18.00</td>
						<td></td>
						<td>16.30-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Алиева Эльзара Деляверовна</td>
						<td>Детский Ортопед</td>
						<td></td>
						<td></td>
						<td></td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Шишкин Алексей Михайлович</td>
						<td>Детский Ортопед</td>
						<td></td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td>9.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Шатохин Павел Борисович</td>
						<td>Детский Ортопед</td>
						<td></td>
						<td></td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Семенчук Тамара Васильевна</td>
						<td>Детский Пульмонолог</td>
						<td></td>
						<td></td>
						<td></td>
						<td>15.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Бондарева Ольга Борисовна</td>
						<td>Педиатр	</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Лавринова Юлия Николаевна</td>
						<td>Педиатр	</td>
						<td></td>
						<td>8.00-<br>15.00</td>
						<td>8.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Сафина Гульфия Ильгизовна</td>
						<td>Педиатр	</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Умерова Азизе Сулеймановна</td>
						<td>Педиатр	</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Чекаренко Ольга Владимировна</td>
						<td>Педиатр	</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Ионичева Екатерина Владимировна</td>
						<td>Детский Хирург, уролог	</td>
						<td>14.00-<br>17.30</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Янец Антон Игоревич</td>
						<td>Детский Хирург, уролог	</td>
						<td></td>
						<td></td>
						<td></td>
						<td>11.00-<br>14.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Охота Марина Викторовна</td>
						<td>Врач ультразвуковой диагностики</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Фурсова Ангелина Павловна</td>
						<td>Врач ультразвуковой диагностики</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td>09.00-<br>15.00</td>
						<td></td>
						<td></td>
					</tr>
				
					
					
					<tr>
						<td>Юрьева Алла Викторовна</td>
						<td>Детский Эндокринолог</td>
						<td></td>
						<td></td>
						<td></td>
						<td>15.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Титова Елена Васильевна</td>
						<td>Нефролог</td>
						<td></td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					
					
			</tbody>
		</table>
</div>
        </div>
      </div>
    </div>
    <!--LEVEL 1-------  конец детской клиники пр. Победы, 99 ""--------------------------------------------------------------------------------------------------------------->



   <!--LEVEL 1------- График приема специалистов ООО "Центр зрения Генезис" ""--------------------------------------------------------------------------------------------------------------->
    <div class="card">
      <div class="card-header" id="headingCZ">
        <h5 class="mb-0">
          <button class="btn_grafic_priema btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCZ" aria-expanded="false" aria-controls="collapseCZ">
				<img src="/wp-content/uploads/2020/07/5-flat.png" class="img_grafic_priema"> 
				<span class="title_grafic_priema">Центра зрения на  ул. Киевская, 153в</span>
          </button>
        </h5>
      </div>
      <div id="collapseCZ" class="collapse" aria-labelledby="headingCZ" data-parent="#accordion">
        <div class="card-body">
			
	    	<input class="form-control" type="text" placeholder="Введите направление или фамилию врача" id="search-CZ" onkeyup="tableSearchCZ()">
			<div class="table-container">
			<table class="timetable table table-striped" id="info-tableCZ" border=1>
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Направление</th>
						<th>ПН</th>
						<th>ВТ</th>
						<th>СР</th>
						<th>ЧТ</th>
						<th>ПТ</th>
						<th>СБ</th>
						<th>ВС</th>
					</tr>	
					
				</thead>
				<tbody>
				
					<tr>
						<td>Семенихина Людмила Ивановна</td>
						<td>Врач-терапевт высшей категории,  главный  врач</td>
						<td>9.00-<br>11.00</td>
						<td>9.00-<br>11.00</td>
						<td>9.00-<br>11.00</td>
						<td>9.00-<br>11.00</td>
						<td>9.00-<br>11.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Якубов Арсен Февзиевич</td>
						<td>Врач-офтальмолог высшей категории, витреоретинальный,   катарактальный хирург</td>
						<td>операц.<br>день</td>
						<td>8.30-<br>15.00</td>
						<td>операц.<br>день</td>
						<td>8.30-<br>15.00</td>
						<td>операц.<br>день</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Ибрагимов Ридван Тулкунович</td>
						<td>Врач-офтальмолог высшей категории,хирург,  заслуженный врач арк</td>
						<td></td>
						<td>операц.<br>день</td>
						<td>12.00-<br>13.00</td>
						<td>12.00-<br>13.00</td>
						<td>12.00-<br>13.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Кулагина Анастасия   Викторовна</td>
						<td>Врач-офтальмолог, витреоретинальный,   катарактальный хирург</td>
						<td>11.00-<br>15.00</td>
						<td></td>
						<td></td>
						<td>08.00-<br>11.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Макарова Лариса Юрьевна</td>
						<td>Врач-офтальмолог высшей категории, лазерный хирург, заслуженный врач АРК</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Кочережкина Светлана Валентиновна</td>
						<td>Врач-офтальмолог высшей категории, лазерный хирург</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Ицкова Светлана Александровна</td>
						<td>Врач-офтальмолог</td>
						<td></td>
						<td>08.00-<br>12.00</td>
						<td>08.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Куржупова Наталья Сергеевна</td>
						<td>Врач-офтальмолог</td>
						<td>08.30-<br>14.30</td>
						<td></td>
						<td></td>
						<td>08.30-<br>14.30</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Усеинова Гульнара Эдемовна</td>
						<td>Врач-офтальмолог</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Сейдалиева Зарема Ахтемовна</td>
						<td>Врач-офтальмолог</td>
						<td>11.00-15.00</td>
						<td></td>
						<td></td>
						<td>08.00-<br>11.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Сейдалиева Зарема Ахтемовна</td>
						<td>Врач-офтальмолог</td>
						<td>11.00-15.00</td>
						<td></td>
						<td></td>
						<td>08.00-<br>11.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Канеев Амин Наильевич</td>
						<td>Врач-офтальмолог</td>
						<td>08.30-<br>12.15</td>
						<td>08.30-<br>12.15</td>
						<td>08.30-<br>12.15</td>
						<td>08.30-<br>12.15</td>
						<td>08.30-<br>12.15</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Константинова Татьяна Всеволодовна</td>
						<td>Врач-кардиолог высшей категории, заслуженный врач АРК</td>
						<td>09.00-<br>12.00</td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Капуста Татьяна Николаевна</td>
						<td>Оптометрист</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
				
					<tr>
						<td>Сеитягьяев Сари Сейранович</td>
						<td>Врач-рентгенолог</td>
						<td>08.30-<br>13.00</td>
						<td>08.30-<br>13.00</td>
						<td>08.30-<br>13.00</td>
						<td>08.30-<br>13.00</td>
						<td>08.30-<br>13.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Кара Оксана Петровна</td>
						<td>Врач-терапевт</td>
						<td>08.00-<br>16.00</td>
						<td>08.00-<br>16.00</td>
						<td>08.00-<br>16.00</td>
						<td>08.00-<br>16.00</td>
						<td>08.00-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Волкова Наталия Александровна</td>
						<td>Врач акушер-гинеколог высшей категории, заслуженный врач Республики Крым</td>
						<td>16.00-<br>18.00</td>
						<td>16.00-<br>18.00</td>
						<td>16.00-<br>18.00</td>
						<td>16.00-<br>18.00</td>
						<td>16.00-<br>18.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Виноградова Яна Игоревна</td>
						<td>Врач акушер-гинеколог</td>
						<td>08.00-<br>12.00</td>
						<td>08.00-<br>12.00</td>
						<td>08.00-<br>12.00</td>
						<td>08.00-<br>12.00</td>
						<td>08.00-<br>12.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Лопатина Галина Леонидовна</td>
						<td>Врач-нефролог высшей категории</td>
						<td></td>
						<td></td>
						<td>09.00-<br>11.00</td>
						<td></td>
						<td>09.00-<br>11.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Калинкин Виталий Павлович</td>
						<td>Врач-оториноларинголог высшей категорииглавный внештатный специалист по Республике Крым</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Шеин Андрей Борисович</td>
						<td>Врач-оториноларинголог</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td>10.00-<br>11.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Голиков Александр Викторович</td>
						<td>Врач-уролог</td>
						<td>16.40-<br>18.00</td>
						<td>16.40-<br>18.00</td>
						<td>16.40-<br>18.00</td>
						<td>16.40-<br>18.00</td>
						<td>16.40-<br>18.00</td>
						<td></td>
						<td></td>						
					</tr>
					
					<tr>
						<td>Коробова Анна Александровна</td>
						<td>Врач-невролог</td>
						<td>09.30-<br>11.30</td>
						<td></td>
						<td></td>
						<td>09.30-<br>11.30</td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>
					
					<tr>
						<td>Заричный Алексей Владимирович</td>
						<td>Врач-травмотолог</td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>
					
					<tr>
						<td>Шахбазиди Димитрос Николаевич</td>
						<td>Врач-эндокринолог</td>
						<td></td>
						<td>11.00-<br>14.00</td>
						<td></td>
						<td>11.00-<br>14.00</td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>
					
					<tr>
						<td>Данич Оксана Анатольевна</td>
						<td>Врач ультразвуковой диагностики</td>
						<td></td>
						<td></td>
						<td>08.30-<br>11.00</td>
						<td>14.30-<br>16.30</td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>
					
					<tr>
						<td>Осадчая Марина Петровна</td>
						<td>Врач ультразвуковой диагностики</td>
						<td></td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>
						<td>09.00-<br>12.00</td>
						<td></td>
						<td></td>						
					</tr>
					
					<tr>
						<td>Соколовская Елена Алексеевна</td>
						<td>Врач ультразвуковой диагностики</td>
						<td></td>
						<td></td>
						<td></td>
						<td>14.00-<br>16.00</td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>					
										
			</tbody>
		</table>
		</div>

        </div>
      </div>
    </div>
    <!--LEVEL 1-------  конец центр зрения ""--------------------------------------------------------------------------------------------------------------->
	
	   <!--LEVEL 1------- График приема специалистов ООО "Центр зрения Генезис" ""--------------------------------------------------------------------------------------------------------------->
    <div class="card">
      <div class="card-header" id="headingCZ2">
        <h5 class="mb-0">
          <button class="btn_grafic_priema btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCZ2" aria-expanded="false" aria-controls="collapseCZ2">
				<img src="/wp-content/uploads/2020/12/ЦЗ.png" class="img_grafic_priema"> 
				<span class="title_grafic_priema">Центра коррекции зрения на  ул. Киевская, 38</span>
          </button>
        </h5>
      </div>
      <div id="collapseCZ2" class="collapse" aria-labelledby="headingCZ" data-parent="#accordion">
        <div class="card-body">
			
	    	<input class="form-control" type="text" placeholder="Введите направление или фамилию врача" id="search-CZ2" onkeyup="tableSearchCZ2()">
			<div class="table-container">
			<table class="timetable table table-striped" id="info-tableCZ2" border=1>
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Направление</th>
						<th>ПН</th>
						<th>ВТ</th>
						<th>СР</th>
						<th>ЧТ</th>
						<th>ПТ</th>
						<th>СБ</th>
						<th>ВС</th>
					</tr>	
					
				</thead>
				<tbody>
				
					<tr>
						<td>Денисова Марина Юрьевна</td>
						<td>Врач-офтальмолог</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Прохоренко Елена Викторовна</td>
						<td>Врач-офтальмолог</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Шкребко Геннадий Леонидович</td>
						<td>Врач-офтальмолог</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td>08.30-<br>16.00</td>
						<td></td>
						<td></td>
					</tr>			
			</tbody>
		</table>
		</div>

        </div>
      </div>
    </div>
    <!--LEVEL 1-------  конец центр зрения 2 ""--------------------------------------------------------------------------------------------------------------->
	
	
	
	   <!--LEVEL 1------- График приема специалистов  ООО "Центр онкологии" -------------------------------------------------------------------------------------------------------------->
    <div class="card">
      <div class="card-header" id="headingONK">
        <h5 class="mb-0">
          <button class="btn_grafic_priema btn btn-link collapsed btn_grafic_priema" data-toggle="collapse" data-target="#collapseONK" aria-expanded="false" aria-controls="collapseONK">
				
					
					<img src="/wp-content/uploads/2020/12/4-flat.png" class="img_grafic_priema" >
									
					<span class="title_grafic_priema">Центра клинической онкологии и гематологии в Мирном</span>
					
				</div>
		  </button>
        </h5>
      </div>
      <div id="collapseONK" class="collapse" aria-labelledby="headingONK" data-parent="#accordion">
        <div class="card-body">
			
	    	<input class="form-control" type="text" placeholder="Введите направление или фамилию врача" id="search-ONK" onkeyup="tableSearchONK()">
			<div class="table-container">
			<table class="timetable table table-striped" id="info-tableONK" border=1>
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Направление</th>
						<th>ПН</th>
						<th>ВТ</th>
						<th>СР</th>
						<th>ЧТ</th>
						<th>ПТ</th>
						<th>СБ</th>
						<th>ВС</th>
					</tr>	
					
				</thead>
				<tbody>
					<tr>						
						<td colspan="9" align="center"><strong>Центр клинической онкологии и гематологии в Мирном</strong></td>					
					</tr>	
				
					<tr>
						<td>Сеферов Бекир Джелялович</td>
						<td>Директор, главный врач, врач-онколог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
				
					<tr>
						<td>Рудяшко Сергей Викторович</td>
						<td>Заведующий отделением - врач-онколог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
									
					<tr>
						<td>Джемакулова Айна Хаджи-Муратовна</td>
						<td>Врач-онколог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
							
					<tr>
						<td>Касич Муждаба Иззетович</td>
						<td>Врач-гематолог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Чауш Руслан Абдуллоевич</td>
						<td>Врач-анестезиолог-реаниматолог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Чувадар Осман Сеитбилялович</td>
						<td>Врач-онколог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
					
					
					<tr>
						<td>Руденко Константин Евгеньевич</td>
						<td>Врач-онколог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Горбатюк Вадим Владимирович</td>
						<td>Врач ультразвуковой диагностики</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Абибуллаев Ленур Рефатович</td>
						<td>Врач-анестезиолог-реаниматолог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Бекиров Эрнест Энверович</td>
						<td>Врач-эндоскопист</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Булатова Светлана Павловна</td>
						<td>Врач функциональной диагностики</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Виноградова Яна Игорьевна</td>
						<td>Врач-акушер-гинеколог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Влахов Александр Кириллович</td>
						<td>Врач ультразвуковой диагностики</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>	
											
					<tr>
						<td>Влахов Александр Кириллович</td>
						<td>Врач ультразвуковой диагностики</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>	
										
					<tr>						
						<td colspan="9" align="center"><strong>Обособленное подразделение г.Севастополь</strong></td>					
					</tr>
					
										
					<tr>
						<td>Танеева Алия Шавкатовна</td>
						<td>Врач-онколог</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td>8.00-<br>16.18</td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Абунц Сергей Арменович </td>
						<td>Врач-онколог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>

					<tr>
						<td>Политова Ирина Александровна</td>
						<td>Врач-терапевт</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Рузанов Андрей Борисович</td>
						<td>Врач-онколог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Хайруллаев Нарим Экремович</td>
						<td>Заместитель директора ОП г.Севастополь</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
			
					<tr>
						<td>Чувадар Осман Сеитбилялович</td>
						<td>Врач-гематолог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
			
					<tr>						
						<td colspan="9" align="center"><strong>Обособленное подразделение г.Ялта</strong></td>					
					</tr>
										
					
					<tr>
						<td>Аметов Леннар Ридиванович</td>
						<td>Заведующий отделением - врач-онколог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
													
					<tr>
						<td>Баснаев Усеин Ибрагимович</td>
						<td>Врач-хирург</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
										
					<tr>
						<td>Горбатюк Вадим Владимирович</td>
						<td>Врач ультразвуковой диагностики</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Какунин Сергей Дмитриевич</td>
						<td>Врач-хирург</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Касич Муждаба Иззетович</td>
						<td>Врач-гематолог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
					
					<tr>
						<td>Семенихина Екатерина Валериевна</td>
						<td>Врач-гастроэнтеролог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>
								
					<tr>
						<td>Шулежко Сергей Андреевич</td>
						<td>Врач-онколог</td>
						<td colspan="7" align="center">График приема уточняйте в контактном центре</td>					
					</tr>								
					
					
			</tbody>
		</table>
	</div>
        </div>
      </div>
    </div>
    <!--LEVEL 1-------  конец  ООО "Центр онкологии" --------------------------------------------------------------------------------------------------------------->
    <br>
    <br>
    <br>

	<script>
			function tableSearch1() {
				var phrase = document.getElementById('search-text1');
				var table = document.getElementById('info-table1');
				var regPhrase = new RegExp(phrase.value, 'i');
				var flag = false;
				for (var i = 1; i < table.rows.length; i++) {
					flag = false;
					for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
						flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
						if (flag) break;
					}
					if (flag) {
						table.rows[i].style.display = "";
					} else {
						table.rows[i].style.display = "none";
					}
				}
			}
			
				function tableSearch2() {
				var phrase = document.getElementById('search-text2');
				var table = document.getElementById('info-table2');
				var regPhrase = new RegExp(phrase.value, 'i');
				var flag = false;
				for (var i = 1; i < table.rows.length; i++) {
					flag = false;
					for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
						flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
						if (flag) break;
					}
					if (flag) {
						table.rows[i].style.display = "";
					} else {
						table.rows[i].style.display = "none";
					}
				}
			}
			
			
			function tableSearch3() {
				var phrase = document.getElementById('search-text3');
				var table = document.getElementById('info-table3');
				var regPhrase = new RegExp(phrase.value, 'i');
				var flag = false;
				for (var i = 1; i < table.rows.length; i++) {
					flag = false;
					for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
						flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
						if (flag) break;
					}
					if (flag) {
						table.rows[i].style.display = "";
					} else {
						table.rows[i].style.display = "none";
					}
				}
			}
			
			
			function tableSearchONK() {
				var phrase = document.getElementById('search-ONK');
				var table = document.getElementById('info-tableONK');
				var regPhrase = new RegExp(phrase.value, 'i');
				var flag = false;
				for (var i = 1; i < table.rows.length; i++) {
					flag = false;
					for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
						flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
						if (flag) break;
					}
					if (flag) {
						table.rows[i].style.display = "";
					} else {
						table.rows[i].style.display = "none";
					}
				}
			}
			
			function tableSearchCZ() {
				var phrase = document.getElementById('search-CZ');
				var table = document.getElementById('info-tableCZ');
				var regPhrase = new RegExp(phrase.value, 'i');
				var flag = false;
				for (var i = 1; i < table.rows.length; i++) {
					flag = false;
					for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
						flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
						if (flag) break;
					}
					if (flag) {
						table.rows[i].style.display = "";
					} else {
						table.rows[i].style.display = "none";
					}
				}
			}
			
			function tableSearchCZ2() {
				var phrase = document.getElementById('search-CZ2');
				var table = document.getElementById('info-tableCZ2');
				var regPhrase = new RegExp(phrase.value, 'i');
				var flag = false;
				for (var i = 1; i < table.rows.length; i++) {
					flag = false;
					for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
						flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
						if (flag) break;
					}
					if (flag) {
						table.rows[i].style.display = "";
					} else {
						table.rows[i].style.display = "none";
					}
				}
			}
			
			
	</script>

    <?php get_footer(); ?>