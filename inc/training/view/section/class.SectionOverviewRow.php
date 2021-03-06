<?php
/**
 * This file contains class::SectionOverviewRow
 * @package Runalyze\DataObjects\Training\View\Section
 */
/**
 * Row: Overview
 * 
 * @author Hannes Christiansen
 * @package Runalyze\DataObjects\Training\View\Section
 */
class SectionOverviewRow extends TrainingViewSectionRowFullwidth {
	/**
	 * Boxed values
	 * @var BoxedValue[]
	 */
	protected $BoxedValues = array();

	/**
	 * Set content
	 */
	protected function setContent() {
		$this->id = 'training-overview';

		$this->setBoxedValues();
		$this->setBoxedValuesToContent();
	}

	/**
	 * Set boxed values to content
	 */
	protected function setBoxedValuesToContent() {
		$NumberOfBoxes = count($this->BoxedValues);
		$ValuesString = '';
		foreach ($this->BoxedValues as &$Value) {
			$Value->defineAsFloatingBlockWithFixedWidth($NumberOfBoxes);
			$ValuesString .= $Value->getCode();
		}

		$this->Content = BoxedValue::getWrappedValues($ValuesString);
	}

	/**
	 * Set boxed values
	 */
	protected function setBoxedValues() {	
		$this->BoxedValues = array(
			new BoxedValue(Helper::Unknown($this->Context->activity()->distance(), '-.--'), 'km', __('Distance')),
			new BoxedValue($this->Context->dataview()->duration()->string(), '', __('Time')),
			new BoxedValue($this->Context->dataview()->elapsedTime(), '', __('Elapsed time')),
			new BoxedValue($this->Context->dataview()->pace()->asMinPerKm(), '/km', __('Pace')),
			new BoxedValue(Helper::Unknown($this->Context->activity()->hrAvg(), '-'), 'bpm', __('&oslash; Heartrate')),
			new BoxedValue(Helper::Unknown($this->Context->activity()->hrMax(), '-'), 'bpm', __('max. Heartrate')),
			new BoxedValue($this->Context->activity()->calories(), 'kcal', __('Calories')),
			new BoxedValue(Helper::Unknown($this->Context->dataview()->vdot()->value(), '-'), '', __('VDOT'), $this->Context->dataview()->vdotIcon()),
			new BoxedValue($this->Context->activity()->trimp(), '', __('TRIMP')),
			new BoxedValue(Helper::Unknown($this->Context->activity()->elevation(), '-'), 'm', __('Elevation'))
		);
	}
}