  <div id="div-stock">
    <h2>Stock</h2>
    <p class="tooltip">Nourriture en stock : <span id="stock-food"><?php echo number_format((float)$_SESSION['player']->getStock_food(), 0, ',', ' '); ?></span> </p>
    <p class="tooltip">Bois en stock : <span id="stock-wood"><?php echo number_format((float)$_SESSION['player']->getStock_wood(), 0, ',', ' '); ?></span> </p>
    <p class="tooltip">Métal en stock : <span id="stock-metal"><?php echo number_format((float)$_SESSION['player']->getStock_metal(), 0, ',', ' '); ?></span> </p>
    <p class="tooltip">Pierre en stock : <span id="stock-stone"><?php echo number_format((float)$_SESSION['player']->getStock_stone(), 0, ',', ' '); ?></span> </p>
    <p class="tooltip">Or en stock : <span id="stock-gold"><?php echo number_format((float)$_SESSION['player']->getStock_gold(), 0, ',', ' '); ?></span> </p>
  </div>