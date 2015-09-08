<?php
require_once 'classes/Enum.php';
require_once 'classes/InfinitiveVerb.php';
require_once 'classes/ConjugatedVerb.php';
require_once 'classes/ConjugatedAuxiliaireVerb.php';
require_once 'classes/EndingWith.php';
require_once 'classes/Tense.php';
require_once 'classes/Person.php';
require_once 'classes/Mood.php';
require_once 'classes/Mode.php';
require_once 'classes/Auxiliaire.php';
require_once 'classes/ConjugationModel.php';
require_once 'classes/ExceptionModel.php';
require 'classes/IrregularExceptionGroup.php';// should be replaced by DB 


function word_stem_length(InfinitiveVerb $infinitiveVerb, $endingLength) {
	return substr ( $infinitiveVerb->getInfinitiveVerb (), 0, - $endingLength);
}

function word_stem_regular(InfinitiveVerb $infinitiveVerb) {
	return word_stem_length($infinitiveVerb, 2);
}

function word_stem_ending_oir(InfinitiveVerb $infinitiveVerb) {
	return word_stem_length($infinitiveVerb, 3);
}

function word_stem_mouvoir_exception(InfinitiveVerb $infinitiveVerb) {
	return word_stem_length($infinitiveVerb, 6);
}

function word_stem(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
	$exceptionmodel = finding_exception_model ( $infinitiveVerb );
	$word_stem = word_stem_regular ( $infinitiveVerb );
	if ($exceptionmodel->getValue () === ExceptionModel::MOUVOIR ) {
		$word_stem = word_stem_ending_oir ( $infinitiveVerb );
	}	
	if ($exceptionmodel->getValue () === ExceptionModel::MOUVOIR && (($mood->getValue () === Mood::Indicatif && $tense->getValue () === Tense::Present && in_array ( $person->getValue (), array (
			Person::FirstPersonSingular,
			Person::SecondPersonSingular,
			Person::ThirdPersonSingular,
			Person::ThirdPersonPlural 
	) ) || $tense->getValue () === Tense::Passe) || ($mood->getValue () === Mood::Subjonctif && $tense->getValue () === Tense::Present && in_array ( $person->getValue (), array (
			Person::FirstPersonSingular,
			Person::SecondPersonSingular,
			Person::ThirdPersonSingular,
			Person::ThirdPersonPlural 
	) ) || $tense->getValue () === Tense::Imparfait) || (($mood->getValue () === Mood::Imperatif && $tense->getValue () === Tense::Present && $person->getValue () === Person::FirstPersonSingular)))) {
		$word_stem = word_stem_mouvoir_exception ( $infinitiveVerb );
	}
	return $word_stem;
}
function participe_word_stem(InfinitiveVerb $infinitiveVerb) {
	$exceptionmodel = finding_exception_model($infinitiveVerb);
	$word_stem = word_stem_regular($infinitiveVerb);
	if ($exceptionmodel->getValue () === ExceptionModel::MOUVOIR) {
		$word_stem = word_stem_mouvoir_exception($infinitiveVerb);
	}	
	return $word_stem;	
}
function finding_infinitive_ending(InfinitiveVerb $infinitiveVerb) {
	switch (substr ( $infinitiveVerb->getInfinitiveVerb(), - 2, 2 )) {
		case 'er' :
			$endingwith = EndingWith::ER;
			switch (substr ( $infinitiveVerb->getInfinitiveVerb(), - 3, 3 )) {
				case 'cer' :
					$endingwith = EndingWith::CER;
					break;
				case 'ger' :
					$endingwith = EndingWith::GER;
					break;
				case 'yer' :
					$endingwith = EndingWith::YER;
					break;
			}
			break;
		case 'ir' :
			$endingwith = EndingWith::IR;
			switch (substr ( $infinitiveVerb->getInfinitiveVerb(), - 3, 3 )) {
				case 'oir' :// Undefined index: -oir
					//$endingwith = EndingWith::OIR;// not ExceptionModel SEOIR !in_array($verb, $seoir) 
					break;
			}
			break;
	}
	return new EndingWith ( $endingwith );
}
function finding_exception_model(InfinitiveVerb $infinitiveVerb) {
	$exceptionmodel = ExceptionModel::NO_EXCEPTIONS;
	if (in_array ( $infinitiveVerb, IrregularExceptionGroup::$mouvoir )) {
		$exceptionmodel = ExceptionModel::MOUVOIR;
	}	
	if (in_array ( $infinitiveVerb, IrregularExceptionGroup::$vetir )) {
		$exceptionmodel = ExceptionModel::VETIR;
	}	
	return new ExceptionModel ( $exceptionmodel );
}

function finding_conjugation_model(InfinitiveVerb $infinitiveVerb) {
	$verbes_pronominaux  = array('aimer','lever');
	$verbes_exclusivement_pronominaux  = array('abrater','empommer');
	if (!in_array ( $infinitiveVerb, $verbes_pronominaux )) {
		$conjugationmodel = ConjugationModel::NonReflexive;
	}
	if (in_array ( $infinitiveVerb, $verbes_pronominaux )) {
		$conjugationmodel = ConjugationModel::Reflexive;
	}
	if (in_array ( $infinitiveVerb, $verbes_exclusivement_pronominaux  )) {
		$conjugationmodel = ConjugationModel::OnlyReflexive;
	}
	return new ConjugationModel ( $conjugationmodel );
}
function personal_pronoun(Person $person, Mood $mood) {
	$finding_person = '"Unknown Person';
	$finding_person = array (
			Person::FirstPersonSingular => 'je',
			Person::SecondPersonSingular => 'tu',
			Person::ThirdPersonSingular => 'il',
			Person::FirstPersonPlural => 'nous',
			Person::SecondPersonPlural => 'vous',
			Person::ThirdPersonPlural => 'ils' 
	);
	$subjonctif_pre_pronouns = array (
			Person::FirstPersonSingular => 'que ',
			Person::SecondPersonSingular => 'que ',
			Person::ThirdPersonSingular => 'qu’',
			Person::FirstPersonPlural => 'que ',
			Person::SecondPersonPlural => 'que ',
			Person::ThirdPersonPlural => 'qu’' 
	);
	
	if ($mood->getValue () === Mood::Subjonctif) {
		return $subjonctif_pre_pronouns [$person->getValue ()] . $finding_person [$person->getValue ()];
	} else {
		return $finding_person [$person->getValue ()];
	}
}
function reflexive_pronoun(Person $person, Mood $mood) {
	$finding_reflexive_pronoun = array (
			Person::FirstPersonSingular => 'me',
			Person::SecondPersonSingular => 'te',
			Person::ThirdPersonSingular => 'se',
			Person::FirstPersonPlural => 'nous',
			Person::SecondPersonPlural => 'vous',
			Person::ThirdPersonPlural => 'se' 
	);
	return $finding_reflexive_pronoun [$person->getValue ()];
}
function merge_pronoun(Person $person, Mood $mood) {
	if ($mood->getValue () === Mood::Subjonctif) {
		return $subjonctif_pre_pronouns [$person->getValue ()] . $finding_person [$person->getValue ()] . $finding_reflexive_pronoun [$person->getValue ()];
	} else {
		return $finding_person [$person->getValue ()] . $finding_reflexive_pronoun [$person->getValue ()];
	}
}
function ending(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$ending = array ( 
			EndingWith::ER => array ( // standard endings for verbs ending with -er
					Mood::Indicatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'e',
									Person::FirstPersonPlural => 'ons',
									Person::SecondPersonPlural => 'ez',
									Person::ThirdPersonPlural => 'ent' 
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'ais',
									Person::SecondPersonSingular => 'ais',
									Person::ThirdPersonSingular => 'ait',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'aient' 
							),
							Tense::Passe => array (
									Person::FirstPersonSingular => 'ai',
									Person::SecondPersonSingular => 'as',
									Person::ThirdPersonSingular => 'a',
									Person::FirstPersonPlural => 'âmes',
									Person::SecondPersonPlural => 'âtes',
									Person::ThirdPersonPlural => 'èrent' 
							),
							Tense::Futur => array (
									Person::FirstPersonSingular => 'erai',
									Person::SecondPersonSingular => 'eras',
									Person::ThirdPersonSingular => 'era',
									Person::FirstPersonPlural => 'erons',
									Person::SecondPersonPlural => 'erez',
									Person::ThirdPersonPlural => 'eront' 
							) 
					),
					Mood::Subjonctif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'e',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'ent' 
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'asse',
									Person::SecondPersonSingular => 'asses',
									Person::ThirdPersonSingular => 'ât',
									Person::FirstPersonPlural => 'assions',
									Person::SecondPersonPlural => 'assiez',
									Person::ThirdPersonPlural => 'assent' 
							) 
					),
					Mood::Conditionnel => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'erais',
									Person::SecondPersonSingular => 'erais',
									Person::ThirdPersonSingular => 'erait',
									Person::FirstPersonPlural => 'erions',
									Person::SecondPersonPlural => 'eriez',
									Person::ThirdPersonPlural => 'eraient' 
							) 
					),
					Mood::Imperatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::FirstPersonPlural => 'ons',
									Person::SecondPersonPlural => 'ez' 
							) 
					) 
			),
			EndingWith::IR => array ( // standard endings for verbs ending with -ir
					Mood::Indicatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'is',
									Person::SecondPersonSingular => 'is',
									Person::ThirdPersonSingular => 'it',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'issais',
									Person::SecondPersonSingular => 'issais',
									Person::ThirdPersonSingular => 'issait',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issaient'
							),
							Tense::Passe => array (
									Person::FirstPersonSingular => 'is',
									Person::SecondPersonSingular => 'is',
									Person::ThirdPersonSingular => 'it',
									Person::FirstPersonPlural => 'îmes',
									Person::SecondPersonPlural => 'îtes',
									Person::ThirdPersonPlural => 'irent'
							),
							Tense::Futur => array (
									Person::FirstPersonSingular => 'irai',
									Person::SecondPersonSingular => 'iras',
									Person::ThirdPersonSingular => 'ira',
									Person::FirstPersonPlural => 'irons',
									Person::SecondPersonPlural => 'irez',
									Person::ThirdPersonPlural => 'iront'
							)
					),
					Mood::Subjonctif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'isse',
									Person::SecondPersonSingular => 'isses',
									Person::ThirdPersonSingular => 'isse',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'isse',
									Person::SecondPersonSingular => 'isses',
									Person::ThirdPersonSingular => 'ît',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issent'
							)
					),
					Mood::Conditionnel => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'irais',
									Person::SecondPersonSingular => 'irais',
									Person::ThirdPersonSingular => 'irait',
									Person::FirstPersonPlural => 'irions',
									Person::SecondPersonPlural => 'iriez',
									Person::ThirdPersonPlural => 'iraient'
							)
					),
					Mood::Imperatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'is',
									Person::FirstPersonPlural => 'issons',
									Person::SecondPersonPlural => 'issez'
							) 
					) 
			),
			EndingWith::OIR => array ( // changed endings for verbs ending with -oir exclusion ExceptionModel SEOIR
					Mood::Indicatif => array (
							Tense::Passe => array (// changing first letter iî into u/û, else like ending-IR 
									Person::FirstPersonSingular => 'us',
									Person::SecondPersonSingular => 'us',
									Person::ThirdPersonSingular => 'ut',
									Person::FirstPersonPlural => 'ûmes',
									Person::SecondPersonPlural => 'ûtes',
									Person::ThirdPersonPlural => 'urent'
							),
							Tense::Futur => array ( // without first letter i, else like ending-IR
									Person::FirstPersonSingular => 'rai',
									Person::SecondPersonSingular => 'ras',
									Person::ThirdPersonSingular => 'ra',
									Person::FirstPersonPlural => 'rons',
									Person::SecondPersonPlural => 'rez',
									Person::ThirdPersonPlural => 'ront'
							)
					),
					Mood::Subjonctif => array (// changing first letter iî into u/û, else like ending-IR 
							Tense::Imparfait => array (// changing first letter iî into u/û, else like ending-IR 
									Person::FirstPersonSingular => 'usse',
									Person::SecondPersonSingular => 'usses',
									Person::ThirdPersonSingular => 'ût',
									Person::FirstPersonPlural => 'ussions',
									Person::SecondPersonPlural => 'ussiez',
									Person::ThirdPersonPlural => 'ussent'
							)
					),
					Mood::Conditionnel => array ( // without first letter i, else like ending-IR
							Tense::Present => array (
									Person::FirstPersonSingular => 'rais',
									Person::SecondPersonSingular => 'rais',
									Person::ThirdPersonSingular => 'rait',
									Person::FirstPersonPlural => 'rions',
									Person::SecondPersonPlural => 'riez',
									Person::ThirdPersonPlural => 'raient'
							)
					)
			)
	);
	switch($exceptionModel->getValue()) {
		case ExceptionModel::VETIR :
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::FirstPersonSingular] = 's';
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::SecondPersonSingular] = 's';
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::ThirdPersonSingular] = '';
			
			$ending [EndingWith::IR] [Mood::Imperatif] [Tense::Present] [Person::FirstPersonSingular] = 's';
			break;
		case ExceptionModel::MOUVOIR :
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::FirstPersonSingular] = 'eus';
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::SecondPersonSingular] = 'eus';
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::ThirdPersonSingular] = 'eut';
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Present] [Person::ThirdPersonPlural] = 'euvent';
			
			$ending [EndingWith::IR] [Mood::Imperatif] [Tense::Present] [Person::FirstPersonSingular] = 'eus';
			
			$ending [EndingWith::IR] [Mood::Indicatif] [Tense::Passe] = array (// delete this, if standard changed ending EndingWith::OIR works
					Person::FirstPersonSingular => 'us',
					Person::SecondPersonSingular => 'us',
					Person::ThirdPersonSingular => 'ut',
					Person::FirstPersonPlural => 'ûmes',
					Person::SecondPersonPlural => 'ûtes',
					Person::ThirdPersonPlural => 'urent' 
			);
			$ending [EndingWith::IR] [Mood::Subjonctif] [Tense::Present] [Person::FirstPersonSingular] = 'euve';
			$ending [EndingWith::IR] [Mood::Subjonctif] [Tense::Present] [Person::SecondPersonSingular] = 'euves';
			$ending [EndingWith::IR] [Mood::Subjonctif] [Tense::Present] [Person::ThirdPersonSingular] = 'euve';
			$ending [EndingWith::IR] [Mood::Subjonctif] [Tense::Present] [Person::ThirdPersonPlural] = 'euvent';
			$ending [EndingWith::IR] [Mood::Subjonctif] [Tense::Imparfait] = array (// delete this, if standard changed ending EndingWith::OIR works
					Person::FirstPersonSingular => 'usse',
					Person::SecondPersonSingular => 'usses',
					Person::ThirdPersonSingular => 'ût',
					Person::FirstPersonPlural => 'ussions',
					Person::SecondPersonPlural => 'ussiez',
					Person::ThirdPersonPlural => 'ussent'
			);
			break;
	}
	return $ending [$endingwith->getValue ()][$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function aller(Person $person, Tense $tense, Mood $mood) {
	$aller_form = array (
			Mood::Indicatif => array (
					Tense::Futur_compose => array (
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vas',
							Person::ThirdPersonSingular => 'va',
							Person::FirstPersonPlural => 'allons',
							Person::SecondPersonPlural => 'allez',
							Person::ThirdPersonPlural => 'vont'
					) 
			) 
	);
	
	return $aller_form [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function conjugated_auxiliaire(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood) {
	switch ($auxiliaire->getValue ()) {
		case Auxiliaire::Etre :
			$conjugated_auxiliaire = array (
					Mood::Indicatif => array (
							Tense::Passe_compose => array (
									Person::FirstPersonSingular => 'suis',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'est',
									Person::FirstPersonPlural => 'sommes',
									Person::SecondPersonPlural => 'êtes',
									Person::ThirdPersonPlural => 'sont' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'étais',
									Person::SecondPersonSingular => 'étais',
									Person::ThirdPersonSingular => 'était',
									Person::FirstPersonPlural => 'étiez',
									Person::SecondPersonPlural => 'étiez',
									Person::ThirdPersonPlural => 'étaient' 
							),
							Tense::Passe_anterieur => array (
									Person::FirstPersonSingular => 'fus',
									Person::SecondPersonSingular => 'fus',
									Person::ThirdPersonSingular => 'fut',
									Person::FirstPersonPlural => 'fûmes',
									Person::SecondPersonPlural => 'fûtes',
									Person::ThirdPersonPlural => 'furent' 
							),
							Tense::Futur_anterieur => array (
									Person::FirstPersonSingular => 'serais',
									Person::SecondPersonSingular => 'serais',
									Person::ThirdPersonSingular => 'serait',
									Person::FirstPersonPlural => 'serions',
									Person::SecondPersonPlural => 'seriez',
									Person::ThirdPersonPlural => 'seraient' 
							) 
					),
					Mood::Subjonctif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'sois',
									Person::SecondPersonSingular => 'sois',
									Person::ThirdPersonSingular => 'soit',
									Person::FirstPersonPlural => 'soyons',
									Person::SecondPersonPlural => 'soyez',
									Person::ThirdPersonPlural => 'soient' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'fusse',
									Person::SecondPersonSingular => 'fusses',
									Person::ThirdPersonSingular => 'fût',
									Person::FirstPersonPlural => 'fussions',
									Person::SecondPersonPlural => 'fussiez',
									Person::ThirdPersonPlural => 'fussent' 
							) 
					),
					Mood::Conditionnel => array (
							Tense::Premiere_Forme => array (
									Person::FirstPersonSingular => 'serais',
									Person::SecondPersonSingular => 'serais',
									Person::ThirdPersonSingular => 'serait',
									Person::FirstPersonPlural => 'serions',
									Person::SecondPersonPlural => 'seriez',
									Person::ThirdPersonPlural => 'seraient' 
							),
							Tense::Deuxieme_Forme => array (
									Person::FirstPersonSingular => 'fusse',
									Person::SecondPersonSingular => 'fusses',
									Person::ThirdPersonSingular => 'fût',
									Person::FirstPersonPlural => 'fussions',
									Person::SecondPersonPlural => 'fussiez',
									Person::ThirdPersonPlural => 'fussent' 
							) 
					),
					Mood::Imperatif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'sois',
									Person::FirstPersonPlural => 'soyons',
									Person::SecondPersonPlural => 'soyez' 
							) 
					) 
			);
			break;
		case Auxiliaire::Avoir :
			$conjugated_auxiliaire = array (
					Mood::Indicatif => array (
							Tense::Passe_compose => array (
									Person::FirstPersonSingular => 'ai',
									Person::SecondPersonSingular => 'as',
									Person::ThirdPersonSingular => 'a',
									Person::FirstPersonPlural => 'avons',
									Person::SecondPersonPlural => 'avez',
									Person::ThirdPersonPlural => 'ont' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'avais',
									Person::SecondPersonSingular => 'avais',
									Person::ThirdPersonSingular => 'avait',
									Person::FirstPersonPlural => 'avions',
									Person::SecondPersonPlural => 'aviez',
									Person::ThirdPersonPlural => 'avaient' 
							),
							Tense::Passe_anterieur => array (
									Person::FirstPersonSingular => 'eus',
									Person::SecondPersonSingular => 'eus',
									Person::ThirdPersonSingular => 'eut',
									Person::FirstPersonPlural => 'eûmes',
									Person::SecondPersonPlural => 'eûtes',
									Person::ThirdPersonPlural => 'eurent' 
							),
							Tense::Futur_anterieur => array (
									Person::FirstPersonSingular => 'aurai',
									Person::SecondPersonSingular => 'auras',
									Person::ThirdPersonSingular => 'aura',
									Person::FirstPersonPlural => 'aurons',
									Person::SecondPersonPlural => 'aurez',
									Person::ThirdPersonPlural => 'auront' 
							) 
					),
					Mood::Subjonctif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'aie',
									Person::SecondPersonSingular => 'aies',
									Person::ThirdPersonSingular => 'ait',
									Person::FirstPersonPlural => 'ayons',
									Person::SecondPersonPlural => 'ayez',
									Person::ThirdPersonPlural => 'aient' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'eusse',
									Person::SecondPersonSingular => 'eusses',
									Person::ThirdPersonSingular => 'eût',
									Person::FirstPersonPlural => 'eussions',
									Person::SecondPersonPlural => 'eussiez',
									Person::ThirdPersonPlural => 'eussent' 
							) 
					),
					Mood::Conditionnel => array (
							Tense::Premiere_Forme => array (
									Person::FirstPersonSingular => 'aurais',
									Person::SecondPersonSingular => 'aurais',
									Person::ThirdPersonSingular => 'aurait',
									Person::FirstPersonPlural => 'aurions',
									Person::SecondPersonPlural => 'auriez',
									Person::ThirdPersonPlural => 'auraient' 
							),
							Tense::Deuxieme_Forme => array (
									Person::FirstPersonSingular => 'eusse',
									Person::SecondPersonSingular => 'eusses',
									Person::ThirdPersonSingular => 'eût',
									Person::FirstPersonPlural => 'eussions',
									Person::SecondPersonPlural => 'eussiez',
									Person::ThirdPersonPlural => 'eussent' 
							) 
					),
					Mood::Imperatif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'aie',
									Person::FirstPersonPlural => 'ayons',
									Person::SecondPersonPlural => 'ayez' 
							) 
					) 
			);
			break;
	}
	if ($tense->getValue () === Tense::Futur_compose) {
		return aller ( $person, $tense, $mood );
	}
	return $conjugated_auxiliaire [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function finding_auxiliaire(InfinitiveVerb $infinitiveVerb) {
	$aux_etre = array ('accourir','advenir','aller','amuser','apparaitre','apparaître','arriver','ascendre','co-naitre','co-naître','convenir',
			'débeller','décéder','démourir','descendre','disconvenir','devenir','échoir','entre-venir','entrer','époustoufler','intervenir',
			'issir','mévenir','monter','mourir','naitre','naître','obvenir','paraitre','paraître','partir','parvenir','pourrir','prémourir',
			'provenir','ragaillardir','raller','réadvenir','re-aller','réapparaitre','réapparaître','reconvenir','redépartir','redescendre',
			'redevenir','réentrer','réintervenir','remonter','remourir','renaitre','renaître','rentrer','revenir','reparaitre','reparaître',
			'repartir','reparvenir','repasser','repourrir','rerentrer','rerester','ressortir','ressouvenir','rester','resurvenir','retomber',
			'retourner','retrépasser','revenir','s’amuser','se redépartir','se sortir','se souvenir','sortir','souvenir','stationner','sur-aller'
			,'suradvenir','survenir','tomber','trépasser','venir');
	$aux_avoir_etre = array ('accourir','ascendre','convenir','déchoir','demeurer','descendre','disparaitre','disparaître','disconvenir',
			'éclore','enclore','entrer ','monter','paraitre','paraître','passer','ragaillardir', 'ré-apparaître','réapparaître','reconvenir',
			'reparaitre','reparaître','sortir','tomber'); // use both auxiliary verbs
	if (in_array ( $infinitiveVerb, $aux_etre )) { // later or in_array($infinitiveVerb, $verbes_pronominaux) only the pronominal version!
		$auxiliaire = Auxiliaire::Etre;
	} else {
		$auxiliaire = Auxiliaire::Avoir;
	}
	return new Auxiliaire ( $auxiliaire );
}
function isPlural(Person $person) {
	$plural_persons = array (
			Person::FirstPersonPlural,
			Person::SecondPersonPlural,
			Person::ThirdPersonPlural 
	);
	return in_array ( $person->getValue (), $plural_persons );
}
function conjugate(InfinitiveVerb $infinitiveVerb , Person $person, Tense $tense, Mood $mood) {
	$endingwith = finding_infinitive_ending($infinitiveVerb );
	$exceptionmodel = finding_exception_model($infinitiveVerb);
	$conjugated_verb = word_stem ( $infinitiveVerb, $person, $tense, $mood) . ending ( $person, $tense, $mood, $endingwith, $exceptionmodel);
	return $conjugated_verb;
}
function isComposite(Mood $mood, Tense $tense) {
	$composite_tenses = array (
			Mood::Indicatif => array (
					Tense::Passe_compose,
					Tense::Plus_que_parfait,
					Tense::Passe_anterieur,
					Tense::Futur_anterieur,
					Tense::Futur_compose 
			),
			Mood::Subjonctif => array (
					Tense::Passe,
					Tense::Plus_que_parfait 
			),
			Mood::Conditionnel => array (
					Tense::Premiere_Forme,
					Tense::Deuxieme_Forme 
			),
			Mood::Imperatif => array (
					Tense::Passe 
			) 
	);
	return in_array ( $tense->getValue (), $composite_tenses [$mood->getValue ()] );
}
function finding_participe_present(InfinitiveVerb $infinitiveVerb) { 
	
if ( finding_infinitive_ending( $infinitiveVerb )->getValue () === EndingWith::ER)
	$participe_present = participe_word_stem ( $infinitiveVerb) . 'ant';
if ( finding_infinitive_ending( $infinitiveVerb )->getValue () === EndingWith::IR)
	$participe_present = participe_word_stem ( $infinitiveVerb) . 'issant';	
	return $participe_present;
}
function finding_participe_passe(InfinitiveVerb $infinitiveVerb) {

	if ( finding_infinitive_ending( $infinitiveVerb)->getValue () === EndingWith::ER)
		$participe_passe = participe_word_stem ( $infinitiveVerb) . 'é';
	if ( finding_infinitive_ending( $infinitiveVerb )->getValue () === EndingWith::IR)
		$participe_passe = participe_word_stem ( $infinitiveVerb) . 'i';
	$exceptionModel = finding_exception_model( $infinitiveVerb );

	
	if ($exceptionModel->getValue () === ExceptionModel::VETIR)
		$participe_passe = participe_word_stem ( $infinitiveVerb) . 'u';
	if ($exceptionModel->getValue () === ExceptionModel::MOUVOIR)
		$participe_passe = participe_word_stem ( $infinitiveVerb) . 'û';
	return $participe_passe;
}
function modes_impersonnels(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Mode $mode, Tense $tense) {
	$participe_passe = finding_participe_passe ($infinitiveVerb);
	$participe_present = finding_participe_present ($infinitiveVerb);
	switch ($auxiliaire->getValue ()) {
		case Auxiliaire::Etre :
			$modes_impersonnels = array (
					Tense::Present => array (
									Mode::Infinitif => $infinitiveVerb,
									Mode::Gerondif => 'en ' . $participe_present,
									Mode::Participe => $participe_present 
							),
					Tense::Passe => array (
									Mode::Infinitif => Auxiliaire::Etre . ' ' . $participe_passe,
									Mode::Gerondif => 'en étant ' . $participe_passe,
									Mode::Participe => $participe_passe 
					) 
			);
			break;
		case Auxiliaire::Avoir :
			$modes_impersonnels = array (
					Tense::Present => array (
									Mode::Infinitif => $infinitiveVerb,
									Mode::Gerondif => 'en ' . $participe_present,
									Mode::Participe => $participe_present 
							),
					Tense::Passe => array (
									Mode::Infinitif => Auxiliaire::Avoir. ' ' . $participe_passe,
									Mode::Gerondif => 'en ayant ' . $participe_passe,
									Mode::Participe => $participe_passe 
							) 
			);
			
			break;
	}
	return $modes_impersonnels [$tense->getValue ()] [$mode->getValue ()];
}

function apostrophized($pronoun, ConjugatedVerb $conjugatedVerb, & $was_apostrophized = null) {
	$h_apire = array (
			'hérisser' 
	); // example values
	if (preg_match ( '~(.*\b[jtms])e$~ui', $pronoun, $m ) && (preg_match ( '~^h?(?:[aæàâeéèêëiîïoôœuûù]|y(?![aæàâeéèêëiîïoôœuûù]))~ui', $conjugatedVerb ) && ! in_array ( $conjugatedVerb->getInfinitive(), $h_apire ))) {
		$was_apostrophized = true;
		return "{$m[1]}’";
	}
	$was_apostrophized = false;
	return $pronoun;
}
function concatenate_apostrophized($pronoun, ConjugatedVerb $conjugatedVerb) {
	$was_apostrophized = false;
	$possiblyApostrophizedPronoun = apostrophized ( $pronoun, $conjugatedVerb,  $was_apostrophized );
	return $was_apostrophized ? $possiblyApostrophizedPronoun . $conjugatedVerb : "$possiblyApostrophizedPronoun $conjugatedVerb";
}
abstract class ConjugationPhrase {
	abstract function accept(ConjugationPhraseVisitor $visitor);
	static function create(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
		$personal_pronoun = personal_pronoun ( $person, $mood );
		if (isComposite ( $mood, $tense )) {
			$participe_passe = finding_participe_passe ( $infinitiveVerb );
			if (finding_auxiliaire ( $infinitiveVerb )->getValue () === Auxiliaire::Etre && (isPlural ( $person ))) {
				$participe_passe .= 's';
			}
			$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( finding_auxiliaire ( $infinitiveVerb ), $person, $tense, $mood );
			if ($mood->getValue () === Mood::Imperatif) {
				return new ImperatifPasseTenseConjugationPhrase ( $conjugated_auxiliaire_verb, $participe_passe );
			}
			if ($tense->getValue () === Tense::Futur_compose) {
				return new FuturComposeTenseConjugationPhrase ( $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb );
			}
			return new CompositeTenseConjugationPhrase ( $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe );
		} else {
			$conjugated_verb = new ConjugatedVerb ( $infinitiveVerb, $person, $tense, $mood );
			if ($mood->getValue () === Mood::Imperatif) {
				return new ImperatifPresentTenseConjugationPhrase ( $conjugated_verb );
			}
			return new SimpleTenseConjugationPhrase ( $personal_pronoun, $conjugated_verb );
		}
	}
}
class SimpleTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTense ( $this );
	}
	public $personal_pronoun, $conjugated_verb;
	public function __construct($personal_pronoun, ConjugatedVerb $conjugated_verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class CompositeTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTense ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class ImperatifPresentTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentTense ( $this );
	}
	public $conjugated_verb;
	public function __construct($conjugated_verb) {
		$this->conjugated_verb = $conjugated_verb;
	}
}
class ImperatifPasseTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPasseTense ( $this );
	}
	public $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct($conjugated_auxiliaire_verb, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class FuturComposeTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeTense ( $this );
	}
	public $personal_pronoun;
	public $conjugated_auxiliaire_verb;
	public $infinitiveVerb;
	public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
abstract class ConjugationPhraseVisitor {
	abstract function visitSimpleTense(SimpleTenseConjugationPhrase $visitee);
	abstract function visitCompositeTense(CompositeTenseConjugationPhrase $visitee);
	abstract function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee);
	abstract function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee);
	abstract function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee);
}
class GoogleTTSConjugationPhraseVisitor extends ConjugationPhraseVisitor {
	function visitSimpleTense(SimpleTenseConjugationPhrase $visitee) {
		return concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_verb );
	}
	function visitCompositeTense(CompositeTenseConjugationPhrase $visitee) {
		return concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . $visitee->participe_passe;
	}
	function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee) {
		return $visitee->conjugated_verb;
	}
	function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee) {
		return $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->participe_passe;
	}
	function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee) {
		return $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->infinitiveVerb;
	}
}
function conjugation_phrase(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
	$conjugationPhrase = ConjugationPhrase::create ( $infinitiveVerb, $person, $tense, $mood );
	$visitor = new GoogleTTSConjugationPhraseVisitor ();
	return $conjugationPhrase->accept ( $visitor );
}
$variable = conjugate ( new InfinitiveVerb ( 'aimer' ), new Person ( Person::FirstPersonSingular ), new Tense ( Tense::Present ), new Mood ( Mood::Indicatif ), new EndingWith ( EndingWith::ER ) );
?>