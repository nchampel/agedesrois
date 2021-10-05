<p class="tooltip">Nourriture dans la ville : <span id="town-food"><?php echo number_format((float)$_SESSION['town']['town-food'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (1 + (int)$_SESSION['farm-level'] * 5), 0, ',', ' ') . ' /h'; ?></span> </p>
<p class="tooltip">Bois dans la ville : <span id="town-wood"><?php echo number_format((float)$_SESSION['town']['town-wood'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (1 + (int)$_SESSION['sawmill-level'] * 4), 0, ',', ' ') . ' /h'; ?></span> </p>
<p class="tooltip">Métal dans la ville : <span id="town-metal"><?php echo number_format((float)$_SESSION['town']['town-metal'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['extractor-level'] * 3), 0, ',', ' ') . ' /h'; ?></span> </p>
<p class="tooltip">Pierre dans la ville : <span id="town-stone"><?php echo number_format((float)$_SESSION['town']['town-stone'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['quarry-level'] * 2), 0, ',', ' ') . ' /h'; ?></span> </p>
<p class="tooltip">Or dans la ville : <span id="town-gold"><?php echo number_format((float)$_SESSION['town']['town-gold'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['mine-level'] * 1), 0, ',', ' ') . ' /h'; ?></span> </p>

<p class="tooltip">Arcs dans la ville : <span id="town-bow"><?php echo number_format((float)$_SESSION['town']['town-bow'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['workshop-level'] * 1), 0, ',', ' ') . ' /h'; ?></span> </p>
<p class="tooltip">Arbalètes dans la ville : <span id="town-crossbow"><?php echo number_format((float)$_SESSION['town']['town-crossbow'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['workshop-level'] * 1), 0, ',', ' ') . ' /h'; ?></span> </p>