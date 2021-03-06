<?php
require_once '../conjugate.php';
class CompositeTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider CompsoiteTestProvider
	 */
	public function testComposite($expectedResult, $tense, $mood) {
		$this->assertEquals ( $expectedResult, isComposite(new Mood($mood),new Tense($tense)));
	}
	public function CompsoiteTestProvider() {
		return [   
				[
						true,
						Tense::Passe_compose,
						Mood::Indicatif,
				],	
				[
						true,
						Tense::Plus_que_parfait,
						Mood::Indicatif,
				],
				[
						true,
						Tense::Passe_anterieur,
						Mood::Indicatif,
				],	
				[
						true,
						Tense::Futur_anterieur,
						Mood::Indicatif,
				],					
				[
						true,
						Tense::Futur_compose,
						Mood::Indicatif,
				],			
				[
						true,
						Tense::Passe_recent,
						Mood::Indicatif,
				],	
				[
						true,
						Tense::Plus_que_parfait,
						Mood::Subjonctif,
				],	
				[
						true,
						Tense::Passe,
						Mood::Subjonctif,
				],
				[
						true,
						Tense::Premiere_Forme,
						Mood::Conditionnel,
				],
				[
						true,
						Tense::Deuxieme_Forme,
						Mood::Conditionnel,
				],					
				[
						true,
						Tense::Passe,
						Mood::Imperatif,
				],
				
				[
						false,
						Tense::Present,
						Mood::Indicatif,
				],	
				[
						false,
						Tense::Imparfait,
						Mood::Indicatif,
				],
				[
						false,
						Tense::Passe,
						Mood::Indicatif,
				],	
				[
						false,
						Tense::Futur,
						Mood::Indicatif,
				],
				[
						false,
						Tense::Present,
						Mood::Subjonctif,
				],	
				[
						false,
						Tense::Imparfait,
						Mood::Subjonctif,
				],
				[
						false,
						Tense::Present,
						Mood::Conditionnel,
				],					
				[
						false,
						Tense::Present,
						Mood::Imperatif,
				],					
		];
	}
}
