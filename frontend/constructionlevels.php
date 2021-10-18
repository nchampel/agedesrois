<p><?php echo ucfirst($_SESSION['castle']->getType_item()); ?> niveau <span id="castle-level"><?php echo $_SESSION['player']->getLevel_castle(); ?></span> </p>
<p><?php echo ucfirst($_SESSION['farm']->getType_item()); ?> niveau <span id="farm-level"><?php echo $_SESSION['player']->getLevel_farm(); ?></span> </p>
<p><?php echo ucfirst($_SESSION['sawmill']->getType_item()); ?> niveau <span id="sawmill-level"><?php echo $_SESSION['player']->getLevel_sawmill(); ?></span> </p>
<p><?php echo ucfirst($_SESSION['extractor']->getType_item()); ?> niveau <span id="extractor-level"><?php echo $_SESSION['player']->getLevel_extractor(); ?></span> </p>
<p><?php echo ucfirst($_SESSION['quarry']->getType_item()); ?> niveau <span id="quarry-level"><?php echo $_SESSION['player']->getLevel_quarry(); ?></span> </p>
<p><?php echo ucfirst($_SESSION['mine']->getType_item()); ?> niveau <span id="mine-level"><?php echo $_SESSION['player']->getLevel_mine(); ?></span> </p>
<p><?php echo ucfirst($_SESSION['barracks']->getType_item()); ?> niveau <span id="barracks-level"><?php echo $_SESSION['player']->getLevel_barracks(); ?></span> </p>

<p><?php echo ucfirst($_SESSION['workshop']->getType_item()); ?> niveau <span id="workshop-level"><?php echo $_SESSION['player']->getLevel_workshop(); ?></span> </p>