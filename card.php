<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
$user = new user();
$table=CMS_HISTORY;
include(DIR_TEMPLATE_PATH.'card.php');
include(DIR_COMMON_PATH.'footer.php');
?>