<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Asperansa\Helper\Helper;
\Bitrix\Main\Localization\Loc::loadMessages(__FILE__); ?>
		<? if ($APPLICATION->GetDirProperty('no_article') != "Y"):?>
				</article>
				<? endif;?>
		<? if (!CSite::InDir(SITE_DIR.'index.php')): ?>		
				</div>
			</section>
		<? endif; ?>
		</div>
		<footer>
			<div class="center">
				<div class="footer_feedback">
					<div class="footer_feedback_header"><?=Helper::getMessage('TAKE_QUESTION');?></div>
					<a href="#" class="footer_feedback_but"><?=Helper::getMessage('FEEDBACK');?></a>
				</div>
				<nav class="footer_menu">
					<? $APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
						"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
							"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
							"MENU_CACHE_TIME" => "36000000",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						),
						false
					); ?>
					<? $APPLICATION->IncludeComponent("bitrix:menu", "second", Array(
						"ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
							"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
							"MENU_CACHE_TIME" => "36000000",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						),
						false
					); ?>
				</nav>
				<div class="footer_container clearfix">
					<div class="footer_left_col"><?Helper::IncludeFile('footer_logo');?></div>
					<div class="footer_right_col"><?Helper::IncludeFile('phone');?></div>
					<div class="footer_center_col"><?Helper::IncludeFile('clinic');?></div>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>