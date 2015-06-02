<?php

	class CarouselItem extends DataObject {

		private static $db = array(
			"Title" => "Varchar(155)",
			"SubTitle" => "Varchar(155)",
			"SortOrder"=>"Int",
			"ExternalLink" => "Text"
		);

		private static $has_one = array (
			"AssociatedPage" => "SiteTree",
			'Image' => 'Image'
		);

		// Summary fields
		private static $summary_fields = array(
			'Title' => 'Title',
			'SubTitle' => 'SubTitle'
		);

		private static $default_sort = "SortOrder";
		

		function getCMSFields() {
			$fields = new FieldList();

			$fields->push( new TextField( 'Title', 'Heading' ));
			$fields->push( new TextField( 'SubTitle', 'Subheading' ));
			$fields->push( new UploadField( 'Image', 'Image (1400px width, 700px height)' ));
			$fields->push( new TreeDropdownField("AssociatedPageID", "Link to this page", "SiteTree"));


			return $fields;
		}

	}