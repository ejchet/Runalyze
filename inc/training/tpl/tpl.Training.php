<h1>
	<?php $this->Training->displayTitle(); ?>

	<small class="right"><?php $this->Training->displayDate(); ?></small>

	<br class="clear" />
</h1>


<div class="toolbar toHeader">
	<div class="toolbar-content toolbar-line">
		<span class="right">
			<?php if ($this->Training->hasPaceData()): ?>
				<label class="checkable"><input type="checkbox" name="" checked="checked" onchange="$('.trainingZones').toggle();" /> Zonen</label>
			<?php endif; ?>
			<?php if ($this->Training->hasPaceData()): ?>
				<label class="checkable"><input type="checkbox" name="" checked="checked" onchange="$('#trainingRounds').toggle();" /> Rundenzeiten</label>
			<?php endif; ?>
			<?php if (count($this->getPlotTypesAsArray()) > 0): ?>
				<label class="checkable"><input type="checkbox" name="" checked="checked" onchange="$('#trainingPlots').toggle();" /> Diagramme</label>
			<?php endif; ?>
			<?php if ($this->Training->hasPositionData()): ?>
				<label class="checkable"><input type="checkbox" name="" checked="checked" onchange="$('#trainingMap').toggle();" /> Karte</label>
			<?php endif; ?>
		</span>

		<?php echo Ajax::window('<a class="labeledLink editLink" href="call/call.Training.edit.php?id='.$this->Training->get('id').'">Bearbeiten</a> ','small'); ?>
		<a class="labeledLink exportLink" href="#">Exportieren</a>

		<br class="clear" />
	</div>
	<div class="toolbar-nav">
		<div class="toolbar-opener" style=""></div>
	</div>
</div>



<div id="trainingTable" class="dataBox">
	<?php $this->Training->displayTable(); ?>
</div>



<div id="trainingChartsAndMap">
	<?php
	$Plots = $this->getPlotTypesAsArray();
	if (!empty($Plots)):
	?>
	<div id="trainingPlots" class="dataBox">
		<div id="plotNavigation" class="dataBox">
			<?php foreach (array_keys($Plots) as $i => $Key): ?>
			<img class="plotToggler active" id="toggle-<?php echo $Key; ?>" src="img/chart-<?php echo $Key; ?>.png" onclick="RunalyzePlot.toggleTrainingChart('<?php echo $Key; ?>');" />
			<?php endforeach; ?>

			<label>
				<input id="checkForMultiplePlots" type="checkbox"<?php if (CONF_TRAINING_PLOTS_BELOW) echo ' checked="checked"'; ?> title="Mehrere Diagramme anzeigen" />
				<img src="img/multiple.png" alt="Mehrere Diagramme anzeigen" />
			</label>

			<div id="chartWidther" class="widtherIsBig" onclick="RunalyzePlot.changeChartWidther();"></div>

			<?php echo Ajax::wrapJSforDocumentReady('RunalyzePlot.initTrainingNavitation();'); ?>
		</div>

		<?php
		foreach (array_keys($Plots) as $i => $Key) {
			echo '<div id="plot-'.$Key.'" style="margin:0 0 5px 0;">';
			$this->displayPlot($Key, false);
			echo '</div>'.NL;
		}
		?>
	</div>
	<?php endif; ?>



	<?php if ($this->Training->hasPositionData()): ?>
		<?php $this->displayRoute(); ?>
	<?php endif; ?>
</div>