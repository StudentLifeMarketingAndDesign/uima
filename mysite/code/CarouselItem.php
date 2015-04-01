<?php

	class CarouselItem extends DataObject {

		private static $db = array(
			"Title" => "Varchar(155)",
			"SubTitle" => "Varchar(155)",
			"SortOrder"=>"Int",
			"ExternalLink" => "Text"
		);

		private static $has_one = array (
			'Image' => 'Image'
		);

		// Summary fields
		public static $summary_fields = array(
			'Title' => 'Title',
			'SubTitle' => 'SubTitle'
		);

		private static $default_sort = "SortOrder";

		function getCMSFields() {
			$fields = new FieldList();

			$fields->push( new TextField( 'Title', 'Heading' ));
			$fields->push( new TextField( 'SubTitle', 'Subheading' ));
			$fields->push( new UploadField( 'Image', 'Image' ));


			return $fields;
		}

	}