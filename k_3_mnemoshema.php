<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/water.css" />
	<script type="text/javascript" src="js/update_main_steam_pipe_test.js"></script>
<style>
	span.boiler {
		/* Квадрат */
		position: absolute;
		background: rgba(0, 255, 0, 0.23);
	}
	span.boiler_bottom {
		/* Трапеция */
		content: "";
		position: absolute;
		border-bottom: 10px solid rgba(0, 255, 0, 0.23);
		border-left: 13px solid transparent;
		border-right: 13px solid transparent;
		transform: rotate(-180deg);
	}
	span.valblock.wateranimate {
		background-image: url('images/level_scale.png');
	}
	span.turbine {
		width: 95px;
		height: 13px;
		background: rgba(216, 0, 0, 0.23);
		/*border: 1px solid red;*/
	}
	span.valblock.torch {
		/*border: 1px solid red;*/
	}
	span.valblock.torch:hover {
		border: 1px solid red;
	}
	span.valblock.turbanimate {
		/*border: 1px solid red;*/
	}
	span.valblock.turbanimate:hover {
		border: 1px solid red;
		border-radius: 50%;
	}
	span.valblock.wateranimate > div.circle {
		width: 25px;
		height: 25px;
		/*border: 1px solid red;*/
	}
	span.valblock.wateranimate {
		/*border: 1px solid red;*/
	}
	td.table_val {
		border: 1px solid #735b7b;
		padding-left: 10px;
		padding-right: 10px;
		text-align: center;
		color: brown;
		font-size: 17px;
	}
</style>
<?php
	include_once 'water.php';
?>
</head>

<body>
	<div class="main">
		<img src="images/main_steam_pipe.png">

<!----------------------------------- К/а БКЗ 210-140 ст.№1 ---------------------------------------->
<style>
	span.valblock.boiler#blFAKEL_K1 {
		left: 174px;
		top: 44px;
		width: 49px;
		height: 112px;
	}
	span.valblock.boiler#blFAKEL_K1:after {
		width: 19px;
		height: 8px;
		left: 18px;
	}
	span.valblock.boiler_bottom#blbtn_K1 {
		left: 0px;
		top: 112px;
		width: 50px;
	}
</style>
	<span class="valblock boiler" id="blFAKEL_K1" title="Котел №1 - нет данных">
		<span class="valblock boiler_bottom" id="blbtn_K1"></span>
	</span>
	<span class="valblock wateranimate" title="Уровень в барабане котла - К1" id="K1Z_L318_wl" style="left: 189px; top: 28px">
		<?php
			water_show();
		?>
	</span>
	<span class="valblock torch" id="K1Z_6_A53" style="left: 203px; top: 87px; width: 13px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-6 котла №1">
	</span>
	<span class="valblock torch" id="K1Z_5_A53" style="left: 203px; top: 99px; width: 13px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-5 котла №1">
	</span>
	<span class="valblock torch" id="K1Z_4_A53" style="left: 203px; top: 111px; width: 13px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-4 котла №1">
	</span>
	<span class="valblock torch" id="K1Z_3_A53" style="left: 203px; top: 123px; width: 13px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-3 котла №1">
	</span>
	<span class="valblock torch" id="K1Z_2_A53" style="left: 203px; top: 133px; width: 13px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-2 котла №1">
	</span>
	<span class="valblock torch" id="K1Z_1_A53" style="left: 203px; top: 145px; width: 13px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-1 котла №1">
	</span>
	<span class="valblock" style="left: 74px; top: 40px">
		<table>
			<tr>
				<td class="signature">G<sub>м</sub></td>
				<td class="value" title="Расход мазута к котлу - Fuel_oil_consumption_K1 = K1Z_F311 + K1Z_F311_1">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_F311&id_unit=77" target="_blank" tabindex="1" id="Fuel_oil_consumption_K1">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 74px; top: 94px">
		<table>
			<tr>
				<td class="signature">G<sub>г</sub></td>
				<td class="value" title="Расход газа к котлу - Gas_consumption_K1 = K1Z_F312 + K1Z_F313">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_F312&id_unit=78" target="_blank" tabindex="2" id="Gas_consumption_K1">N/A</a>
				</td>
				<td class="signature">м<sup>3</sup>/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 91px; top: 195px">
		<table>
			<tr>
				<td class="signature">Q<sub>в</sub></td>
				<td class="value" title="Расход питательной воды - K1Z_F300">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_F300&id_unit=77" target="_blank" tabindex="3" id="K1Z_F300">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 215px; top: 24px">
		<table>
			<tr>
				<td class="signature">L<sub>в</sub></td>
				<td class="value" title="Уровень в барабане котла - K1Z_L318">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_L318&id_unit=70" target="_blank" tabindex="4" id="K1Z_L318">N/A</a>
				</td>
				<td class="signature">мм</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 248px; top: 71px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давление в барабане котла - K1Z_P153">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_P153&id_unit=66" target="_blank" tabindex="5" id="K1Z_P153">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 248px; top: 123px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т.п/пара за котлом - K1Z_T_avg = (K1Z_T004 + K1Z_T005 + K1Z_T006) / 3">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_T005&id_unit=52" target="_blank" tabindex="6" id="K1Z_T_avg">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 246px; top: 170px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход п/пара от котла - K1Z_F302">
					<a href="graph.php?server_number=server_2&tag_name=K1Z_F302&id_unit=77" target="_blank" tabindex="7" id="K1Z_F302">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

<!----------------------------------- К/а БКЗ 210-140 ст.№2 ---------------------------------------->
<style>
	span.valblock.boiler#blFAKEL_K2 {
		left: 438px;
		top: 44px;
		width: 49px;
		height: 112px;
	}
	span.valblock.boiler#blFAKEL_K2:after {
		width: 19px;
		height: 8px;
		left: 18px;
	}
	span.valblock.boiler_bottom#blbtn_K2 {
		left: 0px;
		top: 112px;
		width: 50px;
	}
</style>
	<span class="valblock boiler" id="blFAKEL_K2" title="Котел №2 - нет данных">
		<span class="valblock boiler_bottom" id="blbtn_K2"></span>
	</span>
	<span class="valblock wateranimate" title="Уровень в барабане котла - К2" id="K2_L_baraban_wl" style="left: 451px; top: 29px">
		<?php
			water_show();
		?>
	</span>
	<span class="valblock torch" id="K2_G3" style="left: 466px; top: 91px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-3 котла №2">
	</span>
	<span class="valblock torch" id="K2_G2" style="left: 466px; top: 111px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-2 котла №2">
	</span>
	<span class="valblock torch" id="K2_G1" style="left: 466px; top: 132px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-1 котла №2">
	</span>
	<span class="valblock" style="left: 347px; top: 42px">
		<table>
			<tr>
				<td class="signature">G<sub>м</sub></td>
				<td class="value" title="ПК-2. Расход мазута - K2_CHR_FM_PD1_AI_04">
					<a href="graph.php?server_number=server_4&tag_name=K2_CHR_FM_PD1_AI_04&id_unit=61" target="_blank" tabindex="8" id="K2_CHR_FM_PD1_AI_04">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 342px; top: 95px">
		<table>
			<tr>
				<td class="signature">G<sub>г</sub></td>
				<td class="value" title="ПК-2. Расход газа общий - Gas_consumption_K2 = K2_CHR_FGO_AI">
					<a href="graph.php?server_number=server_4&tag_name=K2_CHR_FGO_AI&id_unit=76" target="_blank" tabindex="9" id="Gas_consumption_K2">N/A</a>
				</td>
				<td class="signature">м<sup>3</sup>/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 357px; top: 195px">
		<table>
			<tr>
				<td class="signature">Q<sub>в</sub></td>
				<td class="value" title="ПК-2.Расход питательной воды - K2_F_pit_v">
					<a href="graph.php?server_number=server_4&tag_name=K2_F_pit_v&id_unit=61" target="_blank" tabindex="10" id="K2_F_pit_v">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 478px; top: 24px">
		<table>
			<tr>
				<td class="signature">L<sub>в</sub></td>
				<td class="value" title="ПК-2.Уровень в барабане котла - K2_L_baraban">
					<a href="graph.php?server_number=server_4&tag_name=K2_L_baraban&id_unit=62" target="_blank" tabindex="11" id="K2_L_baraban">N/A</a>
				</td>
				<td class="signature">мм</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 513px; top: 76px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="ПК-2. Давление пара в барабане - VR18_PK2_7_AI2">
					<a href="graph.php?server_number=server_4&tag_name=VR18_PK2_7_AI2&id_unit=63" target="_blank" tabindex="12" id="VR18_PK2_7_AI2">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 513px; top: 125px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="ПК-2. Т лобовых змеевиков ширм т. 10 ширмы №3_|V ст. п/п - VR18_PK2_6_AI5">
					<a href="graph.php?server_number=server_4&tag_name=VR18_PK2_6_AI5&id_unit=52" target="_blank" tabindex="13" id="VR18_PK2_6_AI5">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 514px; top: 170px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="ПК-2.Расход п/пара за катлом - K2_F1_para_za_k">
					<a href="graph.php?server_number=server_4&tag_name=K2_F1_para_za_k&id_unit=61" target="_blank" tabindex="14" id="K2_F1_para_za_k">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

<!----------------------------------- К/а БКЗ 210-140 ст.№3 ---------------------------------------->
<style>
	span.valblock.boiler#blFAKEL_K3 {
		left: 724px;
		top: 44px;
		width: 49px;
		height: 112px;
	}
	span.valblock.boiler#blFAKEL_K3:after {
		width: 19px;
		height: 8px;
		left: 18px;
	}
	span.valblock.boiler_bottom#blbtn_K3 {
		left: 0px;
		top: 112px;
		width: 50px;
	}
</style>
	<span class="valblock boiler" id="blFAKEL_K3" title="Котел №3 - нет данных">
		<span class="valblock boiler_bottom" id="blbtn_K3"></span>
	</span>
	<span class="valblock wateranimate" title="Уровень в барабане котла - К3" id="K3_3NLC201_13_wl" style="left: 739px; top: 28px">
		<?php
			water_show();
		?>
	</span>
	<span class="valblock torch" id="K3_G3" style="left: 752px; top: 91px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-3 котла №3">
	</span>
	<span class="valblock torch" id="K3_G2" style="left: 752px; top: 111px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-2 котла №3">
	</span>
	<span class="valblock torch" id="K3_G1" style="left: 752px; top: 132px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-1 котла №3">
	</span>
	<span class="valblock" style="left: 625px; top: 40px">
		<table>
			<tr>
				<td class="signature">G<sub>м</sub></td>
				<td class="value" title="Расход мазута - ">
					<a href="graph.php?p=" target="_blank" tabindex="15" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 625px; top: 94px">
		<table>
			<tr>
				<td class="signature">G<sub>г</sub></td>
				<td class="value" title="ПК-3. Расход газа-основной - Gas_consumption_K3 = RMT69L_PK3_1_5 + RMT69L_PK3_1_6">
					<a href="graph.php?server_number=server_4&tag_name=RMT69L_PK3_1_5&id_unit=76" target="_blank" tabindex="16" id="Gas_consumption_K3">N/A</a>
				</td>
				<td class="signature">м<sup>3</sup>/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 647px; top: 195px">
		<table>
			<tr>
				<td class="signature">Q<sub>в</sub></td>
				<td class="value" title="К-3. Расход питательной воды(большой) - RMT69L_PK3_1_3">
					<a href="graph.php?server_number=server_4&tag_name=RMT69L_PK3_1_3&id_unit=61" target="_blank" tabindex="17" id="RMT69L_PK3_1_3">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 765px; top: 24px">
		<table>
			<tr>
				<td class="signature">L<sub>в</sub></td>
				<td class="value" title="ПК-3. Уровень в барабане котла - K3_3NLC201_13">
					<a href="graph.php?server_number=server_4&tag_name=K3_3NLC201_13&id_unit=62" target="_blank" tabindex="18" id="K3_3NLC201_13">N/A</a>
				</td>
				<td class="signature">мм</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 799px; top: 74px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="ПК-3. Давл. пара в барабане котла - K3_3NPC201_9">
					<a href="graph.php?server_number=server_4&tag_name=K3_3NPC201_9&id_unit=63" target="_blank" tabindex="19" id="K3_3NPC201_9">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 799px; top: 118px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="ПК-3. Температура перегретого пара за котлом - VR18_PK3_2_1">
					<a href="graph.php?server_number=server_4&tag_name=VR18_PK3_2_1&id_unit=52" target="_blank" tabindex="20" id="VR18_PK3_2_1">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 799px; top: 166px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="ПК-3. Расход перегретого пара за котлом - K3_3NFC201_10">
					<a href="graph.php?server_number=server_4&tag_name=K3_3NFC201_10&id_unit=61" target="_blank" tabindex="21" id="K3_3NFC201_10">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 713px; top: 273px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т металла 2 сек. ГПК на тройнике р-н 3ПП-5 - RMT59L_TA2_5_11">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_5_11&id_unit=52" target="_blank" tabindex="22" id="RMT59L_TA2_5_11">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 661px; top: 322px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т пара 2 сек. ГПК до задвижки 3ПП-5 - RMT59L_TA2_5_09">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_5_09&id_unit=52" target="_blank" tabindex="23" id="RMT59L_TA2_5_09">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 4px; top: 262px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара за РРОУ-140/14 №1 - VR18_ROY_1_2">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_2&id_unit=52" target="_blank" tabindex="" id="VR18_ROY_1_2">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 4px; top: 292px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давления пара за РРОУ-140/14 № 1 - VR18_ROY_1_9">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_9&id_unit=60" target="_blank" tabindex="" id="VR18_ROY_1_9">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 157px; top: 254px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара до РРОУ-140/14 №1 - VR18_ROY_1_1">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_1&id_unit=52" target="_blank" tabindex="" id="VR18_ROY_1_1">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 424px; top: 658px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара до БРОУ-140/14 №1 - VR18_ROY_1_4">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_4&id_unit=52" target="_blank" tabindex="" id="VR18_ROY_1_4">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 2px; top: 430px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="РОУ-140/33 №4. Температура пара за РОУ-140/33 №4 - VR18_CTS2_1_AI8">
					<a href="graph.php?server_number=server_4&tag_name=VR18_CTS2_1_AI8&id_unit=52" target="_blank" tabindex="" id="VR18_CTS2_1_AI8">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 517px; top: 441px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="РОУ-140/33 №5. Температура пара за РОУ-140/33 №5 - VR18_CTS2_1_AI7">
					<a href="graph.php?server_number=server_4&tag_name=VR18_CTS2_1_AI7&id_unit=52" target="_blank" tabindex="" id="VR18_CTS2_1_AI7">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>

<!----------------------------------- К/а БКЗ 210-140 ст.№4 ---------------------------------------->
<style>
	span.valblock.boiler#blFAKEL_K4 {
		left: 966px;
		top: 43px;
		width: 49px;
		height: 112px;
	}
	span.valblock.boiler#blFAKEL_K4:after {
		width: 19px;
		height: 8px;
		left: 18px;
	}
	span.valblock.boiler_bottom#blbtn_K4 {
		left: 0px;
		top: 112px;
		width: 50px;
	}
</style>
	<span class="valblock boiler" id="blFAKEL_K4" title="Котел №4 - нет данных">
		<span class="valblock boiler_bottom" id="blbtn_K4"></span>
	</span>
	<span class="valblock wateranimate" title="Уровень в барабане котла - К4" id="K4_4NLC201_13_wl" style="left: 981px; top: 26px">
		<?php
			water_show();
		?>
	</span>
	<span class="valblock torch" id="K4_G3" style="left: 994px; top: 90px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-3 котла №4">
	</span>
	<span class="valblock torch" id="K4_G2" style="left: 994px; top: 110px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-2 котла №4">
	</span>
	<span class="valblock torch" id="K4_G1" style="left: 994px; top: 131px; width: 15px; height: 12px; background-image: url(images/torch-15x12.gif)" title="Горелка-1 котла №4">
	</span>
	<span class="valblock" style="left: 869px; top: 38px">
		<table>
			<tr>
				<td class="signature">G<sub>м</sub></td>
				<td class="value" title="Расход мазута - ">
					<a href="" target="_blank" tabindex="24" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 869px; top: 92px">
		<table>
			<tr>
				<td class="signature">G<sub>г</sub></td>
				<td class="value" title="ПК-4. Расход газа к котлу (основная линия) - Gas_consumption_K4 = K4_4NF312">
					<a href="graph.php?server_number=server_4&tag_name=K4_4NF312&id_unit=76" target="_blank" tabindex="25" id="Gas_consumption_K4">N/A</a>
				</td>
				<td class="signature">м<sup>3</sup>/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 884px; top: 195px">
		<table>
			<tr>
				<td class="signature">Q<sub>в</sub></td>
				<td class="value" title="ПК-4. F питательной воды - K4_4NFC201_11">
					<a href="graph.php?server_number=server_4&tag_name=K4_4NFC201_11&id_unit=61" target="_blank" tabindex="26" id="K4_4NFC201_11">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1008px; top: 24px">
		<table>
			<tr>
				<td class="signature">L<sub>в</sub></td>
				<td class="value" title="ПК-4. Уровень в барабане котла - K4_4NLC201_13">
					<a href="graph.php?server_number=server_4&tag_name=K4_4NLC201_13&id_unit=62" target="_blank" tabindex="27" id="K4_4NLC201_13">N/A</a>
				</td>
				<td class="signature">мм</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1039px; top: 72px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="ПК-4. Давл. пара в барабане котла - K4_4NPC201_9">
					<a href="graph.php?server_number=server_4&tag_name=K4_4NPC201_9&id_unit=63" target="_blank" tabindex="28" id="K4_4NPC201_9">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1039px; top: 125px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="PK4. Температура п/пара за катлом - VR18_PK4_2_AI1">
					<a href="graph.php?server_number=server_4&tag_name=VR18_PK4_2_AI1&id_unit=52" target="_blank" tabindex="29" id="VR18_PK4_2_AI1">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1039px; top: 172px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="ПК-4. F перегретого пара за котлом - K4_4NFC201_10">
					<a href="graph.php?server_number=server_4&tag_name=K4_4NFC201_10&id_unit=61" target="_blank" tabindex="30" id="K4_4NFC201_10">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 954px; top: 275px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т металла 2 сек. ГПК на тройнике р-н 4ПП-5 - RMT59L_TA2_5_10">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_5_10&id_unit=52" target="_blank" tabindex="31" id="RMT59L_TA2_5_10">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>

<!----------------------------------- К/а БКЗ 420-140 ст.№5 ---------------------------------------->
<style>
	span.valblock.boiler#blFAKEL_K5 {
		left: 1263px;
		top: 44px;
		width: 49px;
		height: 112px;
	}
	span.valblock.boiler#blFAKEL_K5:after {
		width: 19px;
		height: 8px;
		left: 18px;
	}
	span.valblock.boiler_bottom#blbtn_K5 {
		left: 0px;
		top: 112px;
		width: 50px;
	}
</style>
	<span class="valblock boiler" id="blFAKEL_K5" title="Котел №5 - нет данных">
		<span class="valblock boiler_bottom" id="blbtn_K5"></span>
	</span>
	<span class="valblock wateranimate" title="Уровень в барабане котла - К5" id="K5_PL_wl" style="left: 1278px; top: 28px">
		<?php
			water_show();
		?>
	</span>
	<span class="valblock torch" id="K5_G8" style="left: 1291px; top: 67px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-8 котла №5">
	</span>
	<span class="valblock torch" id="K5_G7" style="left: 1291px; top: 76px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-7 котла №5">
	</span>
	<span class="valblock torch" id="K5_G6" style="left: 1291px; top: 87px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-6 котла №5">
	</span>
	<span class="valblock torch" id="K5_G5" style="left: 1291px; top: 98px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-5 котла №5">
	</span>
	<span class="valblock torch" id="K5_G4" style="left: 1291px; top: 109px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-4 котла №5">
	</span>
	<span class="valblock torch" id="K5_G3" style="left: 1291px; top: 120px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-3 котла №5">
	</span>
	<span class="valblock torch" id="K5_G2" style="left: 1291px; top: 131px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-2 котла №5">
	</span>
	<span class="valblock torch" id="K5_G1" style="left: 1291px; top: 142px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-1 котла №5">
	</span>
	<span class="valblock" style="left: 1116px; top: 49px">
		<table>
			<tr>
				<td class="signature">G<sub>м</sub></td>
				<td class="value" title="Расход мазута - ">
					<a href="" target="_blank" tabindex="32" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1116px; top: 103px">
		<table>
			<tr>
				<td class="signature">G<sub>г</sub></td>
				<td class="value" title="Расход газа - ">
					<a href="graph.php?p=" target="_blank" tabindex="33" id="">N/A</a>
				</td>
				<td class="signature">м<sup>3</sup>/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1122px; top: 162px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="ПК-5. Показания датчика расхода пара п/п №1 - K5_FQ2">
					<a href="graph.php?server_number=server_4&tag_name=К5_FQ2&id_unit=61" target="_blank" tabindex="34" id="K5_FQ2">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1220px; top: 195px">
		<table>
			<tr>
				<td class="signature">Q<sub>в</sub></td>
				<td class="value" title="ПК-5. Показания датчика расхода пит воды - K5_FQ1">
					<a href="graph.php?server_number=server_4&tag_name=К5_FQ1&id_unit=61" target="_blank" tabindex="35" id="K5_FQ1">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1304px; top: 24px">
		<table>
			<tr>
				<td class="signature">L<sub>в</sub></td>
				<td class="value" title="ПК-5. Показания датчика Уровень в барабане котла средний - K5_PL">
					<a href="graph.php?server_number=server_4&tag_name=К5_PL&id_unit=62" target="_blank" tabindex="36" id="K5_PL">N/A</a>
				</td>
				<td class="signature">мм</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1358px; top: 60px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="ПК-5. Показание датчика Давление в барабане - K5_PT">
					<a href="graph.php?server_number=server_4&tag_name=К5_PT&id_unit=63" target="_blank" tabindex="37" id="K5_PT">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1358px; top: 118px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="ПК-5. 17Н. Температура пара на входе III ступени справа - K5_T_avg = RR3_Tp_in + RR3_Tp_out">
					<a href="graph.php?server_number=server_4&tag_name=RR3_Tp_in&id_unit=52" target="_blank" tabindex="38" id="K5_T_avg">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1358px; top: 168px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="ПК-5. Показания датчика расхода пара п/п №2 - K5_FQ3">
					<a href="graph.php?server_number=server_4&tag_name=К5_FQ3&id_unit=61" target="_blank" tabindex="39" id="K5_FQ3">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

<!----------------------------------- К/а БКЗ 420-140 ст.№6 ---------------------------------------->
<style>
	span.valblock.boiler#blFAKEL_K6 {
		left: 1540px;
		top: 44px;
		width: 49px;
		height: 112px;
	}
	span.valblock.boiler#blFAKEL_K6:after {
		width: 19px;
		height: 8px;
		left: 18px;
	}
	span.valblock.boiler_bottom#blbtn_K6 {
		left: 0px;
		top: 112px;
		width: 50px;
	}
</style>
	<span class="valblock boiler" id="blFAKEL_K6" title="Котел №6 - нет данных">
		<span class="valblock boiler_bottom" id="blbtn_K6"></span>
	</span>
	<span class="valblock wateranimate" title="Уровень в барабане котла - К6" id="" style="left: 1555px; top: 28px">
		<?php
			water_show();
		?>
	</span>
	<span class="valblock torch" style="left: 1568px; top: 67px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-8 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 76px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-7 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 87px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-6 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 98px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-5 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 109px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-4 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 120px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-3 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 131px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-2 котла №6">
	</span>
	<span class="valblock torch" style="left: 1568px; top: 142px; width: 14px; height: 6px; background-image: url(images/torch-13x6.gif)" title="Горелка-1 котла №6">
	</span>
	<span class="valblock" style="left: 1441px; top: 40px">
		<table>
			<tr>
				<td class="signature">G<sub>м</sub></td>
				<td class="value" title="Расход мазута - ">
					<a href="" target="_blank" tabindex="40" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1441px; top: 94px">
		<table>
			<tr>
				<td class="signature">G<sub>г</sub></td>
				<td class="value" title="Расход газа - ">
					<a href="" target="_blank" tabindex="41" id="">N/A</a>
				</td>
				<td class="signature">м<sup>3</sup>/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1495px; top: 197px">
		<table>
			<tr>
				<td class="signature">Q<sub>в</sub></td>
				<td class="value" title="Расход воды - ">
					<a href="" target="_blank" tabindex="42" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1581px; top: 24px">
		<table>
			<tr>
				<td class="signature">L<sub>в</sub></td>
				<td class="value" title="Уровень воды в барабане - ">
					<a href="" target="_blank" tabindex="43" id="">N/A</a>
				</td>
				<td class="signature">мм</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1614px; top: 75px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давление - ">
					<a href="" target="_blank" tabindex="44" id="">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1614px; top: 126px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура - ">
					<a href="" target="_blank" tabindex="45" id="">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1619px; top: 161px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="46" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

<!------------------------------------------ РОУ ----------------------------------------------->
	<span class="valblock" style="left: 1523px; top: 230px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура п/пара район задвижки 6ПП-2 - Viz_GPK4s_7">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_7&id_unit=52" target="_blank" tabindex="47" id="Viz_GPK4s_7">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1525px; top: 299px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровод район 6ПП-2 верх - Viz_GPK4s_8">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_8&id_unit=52" target="_blank" tabindex="48" id="Viz_GPK4s_8">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 893px; top: 394px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т пара 2 сек. ГПК да задвижки 4ПП-5 - RMT59L_TA2_5_12">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_5_12&id_unit=52" target="_blank" tabindex="49" id="RMT59L_TA2_5_12">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1041px; top: 407px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура п/пара район задвижки ППС-7 - Viz_GPK4s_13">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_13&id_unit=52" target="_blank" tabindex="50" id="Viz_GPK4s_13">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1086px; top: 441px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровода район ППС-7 верх - Viz_GPK4s_14">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_14&id_unit=52" target="_blank" tabindex="51" id="Viz_GPK4s_14">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1086px; top: 465px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровода район ППС-7 низ - Viz_GPK4s_15">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_15&id_unit=52" target="_blank" tabindex="52" id="Viz_GPK4s_15">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1361px; top: 374px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура п/пара середина секции - Viz_GPK4s_16">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_16&id_unit=52" target="_blank" tabindex="53" id="Viz_GPK4s_16">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1526px; top: 407px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровод середина секции верх - Viz_GPK4s_17">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_17&id_unit=52" target="_blank" tabindex="54" id="Viz_GPK4s_17">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1537px; top: 441px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровода середина секция низ - Viz_GPK4s_18">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_18&id_unit=52" target="_blank" tabindex="55" id="Viz_GPK4s_18">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1457px; top: 480px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="БРОУ-140/14 №2. Температура пара на БРОУ-140/14 №2 - VR18_CTS2_1_AI10">
					<a href="graph.php?server_number=server_4&tag_name=VR18_CTS2_1_AI10&id_unit=52" target="_blank" tabindex="" id="VR18_CTS2_1_AI10">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1446px; top: 520px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="ГПК. Т пара III секции ГПК - VR18_CTS2_1_AI9">
					<a href="graph.php?server_number=server_4&tag_name=VR18_CTS2_1_AI9&id_unit=52" target="_blank" tabindex="56" id="VR18_CTS2_1_AI9">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1484px; top: 589px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="БРОУ-140/22 №2. Температура пара на БРОУ-140/22 №2 - VR18_CTS2_1_AI11">
					<a href="graph.php?server_number=server_4&tag_name=VR18_CTS2_1_AI11&id_unit=52" target="_blank" tabindex="" id="VR18_CTS2_1_AI11">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1683px; top: 512px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="IV секция ГПК. Давления перегретого пара - Viz_GPK4s_1">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_1&id_unit=63" target="_blank" tabindex="57" id="Viz_GPK4s_1">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1683px; top: 536px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура п/пара район задвижки ППС-6 - Viz_GPK4s_10">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_10&id_unit=52" target="_blank" tabindex="58" id="Viz_GPK4s_10">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 289px; top: 620px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара за БРОУ-140/14 №1 - VR18_ROY_1_6">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_6&id_unit=52" target="_blank" tabindex="" id="VR18_ROY_1_6">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 289px; top: 644px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давления пара за БРОУ-140/14 № 1 - VR18_ROY_1_8">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_8&id_unit=60" target="_blank" tabindex="" id="VR18_ROY_1_8">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 265px; top: 671px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="59" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 540px; top: 670px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="60" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 710px; top: 713px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара до БРОУ-140/22 №1 - VR18_ROY_1_3">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_3&id_unit=52" target="_blank" tabindex="" id="VR18_ROY_1_3">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 554px; top: 727px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара за БРОУ-140/22 №1 - VR18_ROY_1_5">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_5&id_unit=52" target="_blank" tabindex="" id="VR18_ROY_1_5">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 554px; top: 762px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давления пара за БРОУ-140/22 №1 - VR18_ROY_1_7">
					<a href="graph.php?server_number=server_4&tag_name=VR18_ROY_1_7&id_unit=60" target="_blank" tabindex="" id="VR18_ROY_1_7">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 609px; top: 555px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т металла 2 сек. ГПК за задвижкой ППС-2 - RMT59L_TA2_5_07">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_5_07&id_unit=52" target="_blank" tabindex="61" id="RMT59L_TA2_5_07">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1041px; top: 555px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Т металла 2 сек. ГПК до задвижки ППС-3 - RMT59L_TA2_5_08">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_5_08&id_unit=52" target="_blank" tabindex="62" id="RMT59L_TA2_5_08">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 799px; top: 672px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="63" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1039px; top: 672px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="64" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1216px; top: 672px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="65" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1359px; top: 671px">
		<table>
			<tr>
				<td class="signature">G<sub>п</sub></td>
				<td class="value" title="Расход пара - ">
					<a href="" target="_blank" tabindex="66" id="">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1613px; top: 556px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровод район ППС-6 верх - Viz_GPK4s_11">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_11&id_unit=52" target="_blank" tabindex="67" id="Viz_GPK4s_11">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1613px; top: 580px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="IV секция ГПК. Температура металла паропровода райо ППС-6 низ - Viz_GPK4s_12">
					<a href="graph.php?server_number=server_4&tag_name=Viz_GPK4s_12&id_unit=52" target="_blank" tabindex="68" id="Viz_GPK4s_12">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>

<!------------------------------ Таблица значений ----------------------------------->
	<span class="valblock" style="left: 9px; top: 575px">
		<table>
			<tr>
				<td colspan="3" class="table_val">Текущие показатели станции</td>
			</tr>
			<tr>
				<td class="table_val">N<sub>тэц</sub></td>
				<td class="table_val" style="width: 65px" title="Суммарная мощность электроэнергии: Nтэц=Nтг-1+Nтг-2+Nтг-3+Nтг-4"><a href="" target="_blank" tabindex="" id="total_power">N/A</a></td>
				<td class="table_val">МВт</td>
			</tr>
			<tr>
				<td class="table_val">Q<sub>тэц</sub><sup>гв</sup></td>
				<td class="table_val" title="Суммарный отпуск тепла по тепломагистралям потребителям: Qг.в.=Qтм-01+Qтм-02+Qтм-03+Qтм-04+Qтм-05"><a href="" target="_blank" tabindex="" id="total_heart">N/A</a></td>
				<td class="table_val">Гкал/ч</td>
			</tr>
			<tr>
				<td class="table_val">G<sub>подп</sub></td>
				<td class="table_val" title="Суммарная подпитка сетевой воды теплосети: Gподп=Gподп.хов.1+Gподп.хов.2"><a href="" target="_blank" tabindex="" id="Gmakeup">N/A</a></td>
				<td class="table_val">т/ч</td>
			</tr>
			<tr>
				<td class="table_val">G<sub>возд</sub><sup>БШК</sup></td>
				<td class="table_val" title="Сжатый воздух от ОАО «Белшина» - rS7a_159T1_Vc"><a href="" target="_blank" tabindex="" id="rS7a_159T1_Vc">N/A</a></td>
				<td class="table_val">м<sup>3</sup>/ч</td>
			</tr>
			<tr>
				<td class="table_val">G<sub>возд</sub><sup>компр</sup></td>
				<td class="table_val" title="Сжатый воздух от компрессоров БТЭЦ-2 - rS9a_159T1_Vc"><a href="" target="_blank" tabindex="" id="rS9a_159T1_Vc">N/A</a></td>
				<td class="table_val">м<sup>3</sup>/ч</td>
			</tr>
			<tr>
				<td class="table_val">G<sub>тех.в.</sub></td>
				<td class="table_val" title="Общий расход технической воды: Gтех.в."><a href="" target="_blank" tabindex="" id="Cons_tech_w">N/A</a></td>
				<td class="table_val">т/ч</td>
			</tr>
			<tr>
				<td class="table_val">t<sub>х.и.</sub></td>
				<td class="table_val" title="Температура холодного источника (тех.воды): tх.и."><a href="" target="_blank" tabindex="" id="tech_water">N/A</a></td>
				<td class="table_val">&deg;C</td>
			</tr>
			<tr>
				<td class="table_val">t<sub>н.в.</sub></td>
				<td class="table_val" title="Температура наружного воздуха: tн.в."><a href="../graph.php?p=9998" target="_blank" tabindex="" id="temp_out_air">N/A</a></td>
				<td class="table_val">&deg;C</td>
			</tr>
		</table>
	</span>

<!----------------------------------- ТГ-1 ---------------------------------------->
	<span class="valblock turbine" id="blturb_1" style="left: 251px; top: 902px" title="Турбина №1 - нет данных">
	</span>
	<span class="valblock turbanimate" id="turbanim_1" style="left: 217px; top: 892px; width: 35px; height: 35px; background-image: url(images/generator.gif)">
	</span>
	<span class="valblock" style="left: 378px; top: 792px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура - ">
					<a href="" target="_blank" tabindex="69" id="">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 378px; top: 816px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давление - ">
					<a href="" target="_blank" tabindex="70" id="">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 276px; top: 857px">
		<table>
			<tr>
				<td class="signature">W</td>
				<td class="value" title="Мощность - TgTag_5112">
					<a href="../graph.php?p=5112" target="_blank" tabindex="71" id="TgTag_5112">N/A</a>
				</td>
				<td class="signature">МВт</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 318px; top: 945px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Датчик P021. Давление пара из отбора турбины №1 - O_P021">
					<a href="graph.php?server_number=server_3&tag_name=O_P021&id_unit=64" target="_blank" tabindex="72" id="O_P021">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 318px; top: 970px">
		<table>
			<tr>
				<td class="signature">F</td>
				<td class="value" title="Датчик F041. Расход пара из отбора турбины №1 - O_F041">
					<a href="graph.php?server_number=server_3&tag_name=O_F041&id_unit=66" target="_blank" tabindex="73" id="O_F041">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

<!----------------------------------- ТГ-2 ---------------------------------------->
	<span class="valblock turbine" id="blturb_2" style="left: 741px; top: 904px" title="Турбина №2 - нет данных">
	</span>
	<span class="valblock turbanimate" id="turbanim_2" style="left: 703px; top: 894px; width: 35px; height: 35px; background-image: url(images/generator.gif)">
	</span>
	<span class="valblock" style="left: 874px; top: 787px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="ТА-2. Т острого пара паропровода №1 - RMT59L_TA2_3_01.1H">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_3_01.1H&id_unit=52" target="_blank" tabindex="74" id="RMT59L_TA2_3_01_1H">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 983px; top: 795px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="ТА-2. Т острого пара паропровода №2 - RMT59L_TA2_3_02.1H">
					<a href="graph.php?server_number=server_3&tag_name=RMT59L_TA2_3_02.1H&id_unit=52" target="_blank" tabindex="75" id="RMT59L_TA2_3_02_1H">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 874px; top: 811px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="ТА-2. Давление в коллекторе впрыска -">
					<a href="graph.php?server_number=server_3&tag_name=2SPT001&id_unit=64" target="_blank" tabindex="76" id="">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 770px; top: 857px">
		<table>
			<tr>
				<td class="signature">W</td>
				<td class="value" title="Мощность - TgTag_2">
					<a href="../graph.php?p=2" target="_blank" tabindex="77" id="TgTag_2">N/A</a>
				</td>
				<td class="signature">МВт</td>
			</tr>
		</table>
	</span>

<!----------------------------------- ТГ-3 ---------------------------------------->
	<span class="valblock turbine" id="blturb_3" style="left: 1281px; top: 904px" title="Турбина №3 - нет данных">
	</span>
	<span class="valblock turbanimate" id="turbanim_3" style="left: 1243px; top: 893px; width: 35px; height: 35px; background-image: url(images/generator.gif)">
	</span>
	<span class="valblock" style="left: 1427px; top: 796px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура - ">
					<a href="" target="_blank" tabindex="78" id="">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1427px; top: 820px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давление - ">
					<a href="" target="_blank" tabindex="79" id="">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1311px; top: 857px">
		<table>
			<tr>
				<td class="signature">W</td>
				<td class="value" title="Мощность - TgTag_5111">
					<a href="../graph.php?p=5111" target="_blank" tabindex="80" id="TgTag_5111">N/A</a>
				</td>
				<td class="signature">МВт</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1351px; top: 945px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Датчик P023. Давление пара из отбора турбины №3 - O_P023">
					<a href="graph.php?server_number=server_3&tag_name=O_P023&id_unit=64" target="_blank" tabindex="81" id="O_P023">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1351px; top: 970px">
		<table>
			<tr>
				<td class="signature">F</td>
				<td class="value" title="Датчик F042. Расход пара из отбора турбины №3 - O_F042">
					<a href="graph.php?server_number=server_3&tag_name=O_F042&id_unit=66" target="_blank" tabindex="82" id="O_F042">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

<!----------------------------------- ТГ-4 ---------------------------------------->
	<span class="valblock turbine" id="blturb_4" style="left: 1836px; top: 820px; width: 18px; height: 113px" title="Турбина №4 - нет данных">
	</span>
	<span class="valblock turbanimate" id="turbanim_4" style="left: 1875px; top: 861px; width: 35px; height: 35px; background-image: url(images/generator.gif)">
	</span>
	<span class="valblock" style="left: 1752px; top: 645px">
		<table>
			<tr>
				<td class="signature">G</td>
				<td class="value" title="Датчик F045_расход пара от ТГ-4 в коллектор 6 ата - O_F045">
					<a href="graph.php?server_number=server_3&tag_name=O_F045&id_unit=66" target="_blank" tabindex="83" id="O_F045">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1753px; top: 669px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давление пара после турбины. P027.3 - SI_P027_3">
					<a href="graph.php?server_number=server_3&tag_name=SI_P027_3&id_unit=64" target="_blank" tabindex="83" id="SI_P027_3">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1805px; top: 713px">
		<table>
			<tr>
				<td class="signature">W</td>
				<td class="value" title="Мощность - SI_G_P">
					<a href="graph.php?server_number=server_3&tag_name=SI_G_P&id_unit=84" target="_blank" tabindex="84" id="SI_G_P">N/A</a>
				</td>
				<td class="signature">МВт</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1751px; top: 1002px">
		<table>
			<tr>
				<td class="signature">T</td>
				<td class="value" title="Температура пара на входе в турбину T136 - SI_T136">
					<a href="graph.php?server_number=server_3&tag_name=SI_T136&id_unit=52" target="_blank" tabindex="85" id="SI_T136">N/A</a>
				</td>
				<td class="signature">&deg;C</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1833px; top: 978px">
		<table>
			<tr>
				<td class="signature">P</td>
				<td class="value" title="Давление пара на входе в турбину. P027.1 - SI_P027_1">
					<a href="graph.php?server_number=server_3&tag_name=SI_P027_1&id_unit=64" target="_blank" tabindex="86" id="SI_P027_1">N/A</a>
				</td>
				<td class="signature">МПа</td>
			</tr>
		</table>
	</span>
	<span class="valblock" style="left: 1837px; top: 1005px">
		<table>
			<tr>
				<td class="value" title="Датчик большого расхода F043. Пар на ТГ-4 - O_F043">
					<a href="graph.php?server_number=server_3&tag_name=O_F043&id_unit=66" target="_blank" tabindex="87" id="O_F043">N/A</a>
				</td>
				<td class="signature">т/ч</td>
			</tr>
		</table>
	</span>

	</div>
</body>
</html>
