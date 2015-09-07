<?php
require_once 'conjugate.php';

class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
	}						
	public function regularVerbProvider() {
		;
		return array (
				array (
						'aime',
						'aimer',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				),
				array (
						'aimes',
						'aimer',
						'Present',
						'SecondPersonSingular',
						'Indicatif' 
				),
				array (
						'aime',
						'aimer',
						'Present',
						'ThirdPersonSingular',
						'Indicatif' 
				),
				array (
						'aimons',
						'aimer',
						'Present',
						'FirstPersonPlural',
						'Indicatif' 
				),
				array (
						'aimez',
						'aimer',
						'Present',
						'SecondPersonPlural',
						'Indicatif' 
				),
				array (
						'aiment',
						'aimer',
						'Present',
						'ThirdPersonPlural',
						'Indicatif' 
				),
				array ( 
						'aime',
						'aimer',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				),	
				array ( 
						'aimons',
						'aimer',
						'Present',
						'FirstPersonPlural',
						'Imperatif'
				),
				array ( 
						'aimez',
						'aimer',
						'Present',
						'SecondPersonPlural',
						'Imperatif'
				),
				array (
						'donne',
						'donner',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				),
				array (
						'donnes',
						'donner',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'donne',
						'donner',
						'Present',
						'ThirdPersonSingular',
						'Indicatif' 
				),
				array (
						'donnons',
						'donner',
						'Present',
						'FirstPersonPlural',
						'Indicatif' 
				),
				array (
						'donnez',
						'donner',
						'Present',
						'SecondPersonPlural',
						'Indicatif' 
				),
				array (
						'donnent',
						'donner',
						'Present',
						'ThirdPersonPlural',
						'Indicatif' 
				) 
		);
	}
	
	/**
	 * @dataProvider UnregularVerbProvider
	 */
	public function testUnregularVerb($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
			$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
	}
	public function UnregularVerbProvider() {
		return array (
   // MOUVOIR
				array (
						'meus',
						'mouvoir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'meus',
						'mouvoir',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'meut',
						'mouvoir',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),	
				array (
						'meuvent',
						'mouvoir',
						'Present',
						'ThirdPersonPlural',
						'Indicatif'
				),				
	// VETIR
				array (
						'vêts',
						'vêtir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'vêts',
						'vêtir',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'vêt',
						'vêtir',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (
						'vêts',
						'vêtir',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				),				
		);
	}	
}
?>
