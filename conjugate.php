<?php
require_once 'classes/Enum.php';
require_once 'classes/InfinitiveVerb.php';
require_once 'classes/PersonalPronoun.php';
require_once 'classes/ReflexivePronoun.php';
require_once 'classes/ConjugatedVerb.php';
require_once 'classes/ConjugatedAuxiliaireVerb.php';
require_once 'classes/EndingWith.php';
require_once 'classes/Tense.php';
require_once 'classes/Person.php';
require_once 'classes/Gender.php';
require_once 'classes/Voice.php';
require_once 'classes/SentenceType.php';
require_once 'classes/Mood.php';
require_once 'classes/Mode.php';
require_once 'classes/Auxiliaire.php';
require_once 'classes/ConjugationModel.php';
require_once 'classes/ExceptionModel.php';
require_once 'classes/IrregularExceptionGroup.php'; // should be replaced by DB
require_once 'word_stem.php';
require_once 'groups/verbes_pronominaux.php';
require_once 'groups/verbes_exclusivement_pronominaux.php';
require_once 'groups/h_apire.php';
function finding_infinitive_ending(InfinitiveVerb $infinitiveVerb) {
	switch (mb_substr ( $infinitiveVerb->getInfinitiveVerb (), - 2, 2 )) {
		case 'er' :
			$endingwith = EndingWith::ER;
			break;
		case 'ir' :
			$endingwith = EndingWith::IR;
			switch (mb_substr ( $infinitiveVerb->getInfinitiveVerb (), - 3, 3 )) {
				case 'oir' : // Undefined index: -oir
					$endingwith = EndingWith::OIR; // not ExceptionModel SEOIR !in_array($verb, $seoir)
					break;
			}
			break;
		case 're' :
			$endingwith = EndingWith::RE;
			break;
		case 'ïr' :
			$endingwith = EndingWith::I_TREMA_R;
			break;
	}
	return new EndingWith ( $endingwith );
}
function finding_exception_model(InfinitiveVerb $infinitiveVerb) {
	$exceptionmodel = ExceptionModel::NO_EXCEPTIONS;	
	$irregularExceptionGroupArray = [ 
			ExceptionModel::ALLER => IrregularExceptionGroup::$aller,
			ExceptionModel::AVOIR_IRR => IrregularExceptionGroup::$avoir_irr,
			ExceptionModel::ETRE_IRR => IrregularExceptionGroup::$etre_irr,
			ExceptionModel::Eler_Ele => IrregularExceptionGroup::$eler_ele,
			ExceptionModel::Eter_Ete => IrregularExceptionGroup::$eter_ete,
			ExceptionModel::Eler_Elle => IrregularExceptionGroup::$eler_elle,
			ExceptionModel::Eter_Ette => IrregularExceptionGroup::$eter_ette,
			ExceptionModel::ENVOYER => IrregularExceptionGroup::$envoyer,
			ExceptionModel::ARGUER => IrregularExceptionGroup::$arguer,			
			ExceptionModel::CER => IrregularExceptionGroup::$cer,
			ExceptionModel::ECER => IrregularExceptionGroup::$ecer,
			ExceptionModel::ESCER => IrregularExceptionGroup::$escer,				
			ExceptionModel::GER => IrregularExceptionGroup::$ger,
			ExceptionModel::IER => IrregularExceptionGroup::$ier,
			ExceptionModel::YER_YE_IE => IrregularExceptionGroup::$yer_ye_ie,
			ExceptionModel::YER_YE => IrregularExceptionGroup::$yer_ye,
			ExceptionModel::YER_IE => IrregularExceptionGroup::$yer_ie,			
			ExceptionModel::E_Akut_ER => IrregularExceptionGroup::$e_akut_er,
			ExceptionModel::E_Akut_ER2 => IrregularExceptionGroup::$e_akut_er2,//regular			
			ExceptionModel::E_Akut_CER => IrregularExceptionGroup::$e_akut_cer,
			ExceptionModel::E_Akut_GER => IrregularExceptionGroup::$e_akut_ger,
			ExceptionModel::E_Akut_IER => IrregularExceptionGroup::$e_akut_ier,//regular
			ExceptionModel::E_Akut_IIER => IrregularExceptionGroup::$e_akut_iier,			
			ExceptionModel::E_Akut_YER => IrregularExceptionGroup::$e_akut_yer,
			ExceptionModel::E_Er => IrregularExceptionGroup::$e_er,
			ExceptionModel::I_Trema_ER => IrregularExceptionGroup::$i_trema_er,//regular
			ExceptionModel::DEVOIR => IrregularExceptionGroup::$devoir,
			ExceptionModel::FALLOIR => IrregularExceptionGroup::$falloir,
			ExceptionModel::MOUVOIR => IrregularExceptionGroup::$mouvoir,
			ExceptionModel::PLEUVOIR => IrregularExceptionGroup::$pleuvoir,
			ExceptionModel::POUVOIR => IrregularExceptionGroup::$pouvoir,
			ExceptionModel::SAVOIR => IrregularExceptionGroup::$savoir,
			ExceptionModel::VALOIR => IrregularExceptionGroup::$valoir,
			ExceptionModel::VOIR => IrregularExceptionGroup::$voir,
			ExceptionModel::RAMENTEVOIR => IrregularExceptionGroup::$ramentevoir,			
			ExceptionModel::CHOIR => IrregularExceptionGroup::$choir,
			ExceptionModel::CHOIR2 => IrregularExceptionGroup::$choir2,		
			ExceptionModel::CEVOIR => IrregularExceptionGroup::$cevoir,
			ExceptionModel::SEOIR => IrregularExceptionGroup::$seoir,
			ExceptionModel::VOULOIR => IrregularExceptionGroup::$vouloir,
			ExceptionModel::RIR => IrregularExceptionGroup::$rir,
			ExceptionModel::COURIR => IrregularExceptionGroup::$courir,
			ExceptionModel::FLEURIR => IrregularExceptionGroup::$fleurir,
			ExceptionModel::MOURIR => IrregularExceptionGroup::$mourir,
			ExceptionModel::QUERIR => IrregularExceptionGroup::$querir,
			ExceptionModel::DORMIR => IrregularExceptionGroup::$dormir,
			ExceptionModel::ENIR => IrregularExceptionGroup::$enir,
			ExceptionModel::BOUILLIR => IrregularExceptionGroup::$bouillir,
			ExceptionModel::CUEILLIR => IrregularExceptionGroup::$cueillir,
			ExceptionModel::FAILLIR => IrregularExceptionGroup::$faillir,
			ExceptionModel::SAILLIR => IrregularExceptionGroup::$saillir,
			ExceptionModel::TIR => IrregularExceptionGroup::$tir,
			ExceptionModel::VETIR => IrregularExceptionGroup::$vetir,
			ExceptionModel::FUIR => IrregularExceptionGroup::$fuir,
			ExceptionModel::SERVIR => IrregularExceptionGroup::$servir,
			ExceptionModel::FAIRE => IrregularExceptionGroup::$faire,
			ExceptionModel::PLAIRE => IrregularExceptionGroup::$plaire,
			ExceptionModel::RAIRE => IrregularExceptionGroup::$raire,
			ExceptionModel::TAIRE => IrregularExceptionGroup::$taire,
			ExceptionModel::VAINCRE => IrregularExceptionGroup::$vaincre,
			ExceptionModel::DRE => IrregularExceptionGroup::$dre,
			ExceptionModel::PRENDRE => IrregularExceptionGroup::$prendre,
			ExceptionModel::INDRE => IrregularExceptionGroup::$indre,
			ExceptionModel::OINDRE => IrregularExceptionGroup::$oindre,
			ExceptionModel::COUDRE => IrregularExceptionGroup::$coudre,
			ExceptionModel::MOUDRE => IrregularExceptionGroup::$moudre,
			ExceptionModel::SOUDRE => IrregularExceptionGroup::$soudre,
			ExceptionModel::RESOUDRE => IrregularExceptionGroup::$resoudre,
			ExceptionModel::OCCIRE => IrregularExceptionGroup::$occire,
			ExceptionModel::CIRCONCIRE => IrregularExceptionGroup::$circoncire,
			ExceptionModel::DIRE => IrregularExceptionGroup::$dire,
			ExceptionModel::MAUDIRE => IrregularExceptionGroup::$maudire,
			ExceptionModel::SUFFIRE => IrregularExceptionGroup::$suffire,
			ExceptionModel::CONFIRE => IrregularExceptionGroup::$confire,
			ExceptionModel::LIRE => IrregularExceptionGroup::$lire,
			ExceptionModel::BOIRE => IrregularExceptionGroup::$boire,
			ExceptionModel::CROIRE => IrregularExceptionGroup::$croire,
			ExceptionModel::RIRE => IrregularExceptionGroup::$rire,
			ExceptionModel::CRIRE => IrregularExceptionGroup::$crire,
			ExceptionModel::FRIRE => IrregularExceptionGroup::$frire,
			ExceptionModel::UIRE => IrregularExceptionGroup::$uire,
			ExceptionModel::BRUIRE => IrregularExceptionGroup::$bruire,
			ExceptionModel::CLORE => IrregularExceptionGroup::$clore,
			ExceptionModel::ROMPRE => IrregularExceptionGroup::$rompre,			
			ExceptionModel::AITRE => IrregularExceptionGroup::$aitre,
			ExceptionModel::NAITRE => IrregularExceptionGroup::$naitre,
			ExceptionModel::OITRE => IrregularExceptionGroup::$oitre,
			ExceptionModel::ATTRE => IrregularExceptionGroup::$attre,
			ExceptionModel::METTRE => IrregularExceptionGroup::$mettre,
			ExceptionModel::FOUTRE => IrregularExceptionGroup::$foutre,
			ExceptionModel::CLURE => IrregularExceptionGroup::$clure,
			ExceptionModel::SUIVRE => IrregularExceptionGroup::$suivre,
			ExceptionModel::VIVRE => IrregularExceptionGroup::$vivre 
	];	
	foreach ( $irregularExceptionGroupArray as $exceptionModel => $irregularExceptionGroup ) {
		if (in_array ( $infinitiveVerb, $irregularExceptionGroup ))
			$exceptionmodel = $exceptionModel;
	}	
	return new ExceptionModel ( $exceptionmodel );
}
function finding_conjugation_model(InfinitiveVerb $infinitiveVerb) {
	global $verbes_pronominaux, $verbes_exclusivement_pronominaux;
	
	if (! in_array ( $infinitiveVerb, $verbes_pronominaux ))
		$conjugationmodel = ConjugationModel::NonReflexive;
	if (in_array ( $infinitiveVerb, $verbes_pronominaux ) && !in_array ( $infinitiveVerb, $verbes_exclusivement_pronominaux ))
		$conjugationmodel = ConjugationModel::Reflexive;
	if (in_array ( $infinitiveVerb, $verbes_exclusivement_pronominaux ))
		$conjugationmodel = ConjugationModel::OnlyReflexive;
	return new ConjugationModel ( $conjugationmodel );
}
function personal_pronoun(Person $person, Gender $gender, Mood $mood) {
	$finding_person = 'Unknown Person';
	if ($gender->getValue () === Gender::Masculine) {
		$finding_person = [ 
				Person::FirstPersonSingular => 'je',
				Person::SecondPersonSingular => 'tu',
				Person::ThirdPersonSingular => 'il',
				Person::FirstPersonPlural => 'nous',
				Person::SecondPersonPlural => 'vous',
				Person::ThirdPersonPlural => 'ils' 
		];
	}
	if ($gender->getValue () === Gender::Feminine) {
		$finding_person = [ 
				Person::FirstPersonSingular => 'je',
				Person::SecondPersonSingular => 'tu',
				Person::ThirdPersonSingular => 'elle',
				Person::FirstPersonPlural => 'nous',
				Person::SecondPersonPlural => 'vous',
				Person::ThirdPersonPlural => 'elles' 
		];
	}
	$subjonctif_pre_pronouns = [ 
			Person::FirstPersonSingular => 'que ',
			Person::SecondPersonSingular => 'que ',
			Person::ThirdPersonSingular => 'qu’',
			Person::FirstPersonPlural => 'que ',
			Person::SecondPersonPlural => 'que ',
			Person::ThirdPersonPlural => 'qu’' 
	];
	
	if ($mood->getValue () === Mood::Subjonctif)
		return $subjonctif_pre_pronouns [$person->getValue ()] . $finding_person [$person->getValue ()];
	else
		return $finding_person [$person->getValue ()];
}
function reflexive_pronoun(Person $person, Mood $mood, SentenceType $sentencetype) {
	$finding_reflexive_pronoun = [ 
			Person::FirstPersonSingular => 'me',
			Person::SecondPersonSingular => 'te',
			Person::ThirdPersonSingular => 'se',
			Person::FirstPersonPlural => 'nous',
			Person::SecondPersonPlural => 'vous',
			Person::ThirdPersonPlural => 'se' 
	];
	if ($mood->getValue () === Mood::Imperatif && $sentencetype->getValue () === SentenceType::DeclarativeSentence)
		$finding_reflexive_pronoun = [ 
				Person::SecondPersonSingular => '-toi',
				Person::FirstPersonPlural => '-nous',
				Person::SecondPersonPlural => '-vous' 
		];
	if ($mood->getValue () === Mood::Imperatif && $sentencetype->getValue () === SentenceType::Negation)
		$finding_reflexive_pronoun = [ 
				Person::SecondPersonSingular => 'te',
				Person::FirstPersonPlural => 'nous',
				Person::SecondPersonPlural => 'vous' 
		];
	return $finding_reflexive_pronoun [$person->getValue ()];
}
include_once 'ending.php';
function aller(Person $person, Tense $tense, Mood $mood, Voice $voice) {
	$aller_form = [ 
			Mood::Indicatif => [ 
					Tense::Futur_compose => [ 
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vas',
							Person::ThirdPersonSingular => 'va',
							Person::FirstPersonPlural => 'allons',
							Person::SecondPersonPlural => 'allez',
							Person::ThirdPersonPlural => 'vont' 
					] 
			] 
	];
	return '<i>'.$aller_form [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()].'</i>';
}
function venir(Person $person, Tense $tense, Mood $mood, Voice $voice) {
	$venir_form = [ 
			Mood::Indicatif => [ 
					Tense::Passe_recent => [ 
							Person::FirstPersonSingular => 'viens',
							Person::SecondPersonSingular => 'viens',
							Person::ThirdPersonSingular => 'vient',
							Person::FirstPersonPlural => 'venons',
							Person::SecondPersonPlural => 'venez',
							Person::ThirdPersonPlural => 'viennent' 
					] 
			] 
	];
	return '<i>'.$venir_form [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()].'</i>';
}
function etre_passive(Person $person, Tense $tense, Mood $mood) {
	$etre_passive_form = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'suis',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'est',
							Person::FirstPersonPlural => 'sommes',
							Person::SecondPersonPlural => 'êtes',
							Person::ThirdPersonPlural => 'sont' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'étais',
							Person::SecondPersonSingular => 'étais',
							Person::ThirdPersonSingular => 'était',
							Person::FirstPersonPlural => 'étions',
							Person::SecondPersonPlural => 'étiez',
							Person::ThirdPersonPlural => 'étaient' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'fus',
							Person::SecondPersonSingular => 'fus',
							Person::ThirdPersonSingular => 'fut',
							Person::FirstPersonPlural => 'fûmes',
							Person::SecondPersonPlural => 'fûtes',
							Person::ThirdPersonPlural => 'furent' 
					],
					Tense::Futur => [ 
							Person::FirstPersonSingular => 'serai',
							Person::SecondPersonSingular => 'seras',
							Person::ThirdPersonSingular => 'sera',
							Person::FirstPersonPlural => 'serons',
							Person::SecondPersonPlural => 'serez',
							Person::ThirdPersonPlural => 'seront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'sois',
							Person::SecondPersonSingular => 'sois',
							Person::ThirdPersonSingular => 'soit',
							Person::FirstPersonPlural => 'soyons',
							Person::SecondPersonPlural => 'soyez',
							Person::ThirdPersonPlural => 'soient' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'fusse',
							Person::SecondPersonSingular => 'fusses',
							Person::ThirdPersonSingular => 'fût',
							Person::FirstPersonPlural => 'fussions',
							Person::SecondPersonPlural => 'fussiez',
							Person::ThirdPersonPlural => 'fussent' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'serais',
							Person::SecondPersonSingular => 'serais',
							Person::ThirdPersonSingular => 'serait',
							Person::FirstPersonPlural => 'serions',
							Person::SecondPersonPlural => 'seriez',
							Person::ThirdPersonPlural => 'seraient' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::SecondPersonSingular => 'sois',
							Person::FirstPersonPlural => 'soyons',
							Person::SecondPersonPlural => 'soyez' 
					] 
			] 
	];
	return '<i>'.$etre_passive_form [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()].'</i>';	
}
function conjugated_auxiliaire(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood, Voice $voice, SentenceType $sentencetype) {
	switch ($auxiliaire->getValue ()) {
		case Auxiliaire::Etre :
			$conjugated_auxiliaire = [ 
					Mood::Indicatif => [ 
							Tense::Passe_compose => [ 
									Person::FirstPersonSingular => 'suis',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'est',
									Person::FirstPersonPlural => 'sommes',
									Person::SecondPersonPlural => 'êtes',
									Person::ThirdPersonPlural => 'sont' 
							],
							Tense::Plus_que_parfait => [ 
									Person::FirstPersonSingular => 'étais',
									Person::SecondPersonSingular => 'étais',
									Person::ThirdPersonSingular => 'était',
									Person::FirstPersonPlural => 'étions',
									Person::SecondPersonPlural => 'étiez',
									Person::ThirdPersonPlural => 'étaient' 
							],
							Tense::Passe_anterieur => [ 
									Person::FirstPersonSingular => 'fus',
									Person::SecondPersonSingular => 'fus',
									Person::ThirdPersonSingular => 'fut',
									Person::FirstPersonPlural => 'fûmes',
									Person::SecondPersonPlural => 'fûtes',
									Person::ThirdPersonPlural => 'furent' 
							],
							Tense::Futur_anterieur => [ 
									Person::FirstPersonSingular => 'serai',
									Person::SecondPersonSingular => 'seras',
									Person::ThirdPersonSingular => 'sera',
									Person::FirstPersonPlural => 'serons',
									Person::SecondPersonPlural => 'serez',
									Person::ThirdPersonPlural => 'seront' 
							] 
					],
					Mood::Subjonctif => [ 
							Tense::Passe => [ 
									Person::FirstPersonSingular => 'sois',
									Person::SecondPersonSingular => 'sois',
									Person::ThirdPersonSingular => 'soit',
									Person::FirstPersonPlural => 'soyons',
									Person::SecondPersonPlural => 'soyez',
									Person::ThirdPersonPlural => 'soient' 
							],
							Tense::Plus_que_parfait => [ 
									Person::FirstPersonSingular => 'fusse',
									Person::SecondPersonSingular => 'fusses',
									Person::ThirdPersonSingular => 'fût',
									Person::FirstPersonPlural => 'fussions',
									Person::SecondPersonPlural => 'fussiez',
									Person::ThirdPersonPlural => 'fussent' 
							] 
					],
					Mood::Conditionnel => [ 
							Tense::Premiere_Forme => [ 
									Person::FirstPersonSingular => 'serais',
									Person::SecondPersonSingular => 'serais',
									Person::ThirdPersonSingular => 'serait',
									Person::FirstPersonPlural => 'serions',
									Person::SecondPersonPlural => 'seriez',
									Person::ThirdPersonPlural => 'seraient' 
							],
							Tense::Deuxieme_Forme => [ 
									Person::FirstPersonSingular => 'fusse',
									Person::SecondPersonSingular => 'fusses',
									Person::ThirdPersonSingular => 'fût',
									Person::FirstPersonPlural => 'fussions',
									Person::SecondPersonPlural => 'fussiez',
									Person::ThirdPersonPlural => 'fussent' 
							] 
					],
					Mood::Imperatif => [ 
							Tense::Passe => [ 
									Person::SecondPersonSingular => 'sois',
									Person::FirstPersonPlural => 'soyons',
									Person::SecondPersonPlural => 'soyez' 
							] 
					] 
			];
			break;
		case Auxiliaire::Avoir :
			$conjugated_auxiliaire = [ 
					Mood::Indicatif => [ 
							Tense::Passe_compose => [ 
									Person::FirstPersonSingular => 'ai',
									Person::SecondPersonSingular => 'as',
									Person::ThirdPersonSingular => 'a',
									Person::FirstPersonPlural => 'avons',
									Person::SecondPersonPlural => 'avez',
									Person::ThirdPersonPlural => 'ont' 
							],
							Tense::Plus_que_parfait => [ 
									Person::FirstPersonSingular => 'avais',
									Person::SecondPersonSingular => 'avais',
									Person::ThirdPersonSingular => 'avait',
									Person::FirstPersonPlural => 'avions',
									Person::SecondPersonPlural => 'aviez',
									Person::ThirdPersonPlural => 'avaient' 
							],
							Tense::Passe_anterieur => [ 
									Person::FirstPersonSingular => 'eus',
									Person::SecondPersonSingular => 'eus',
									Person::ThirdPersonSingular => 'eut',
									Person::FirstPersonPlural => 'eûmes',
									Person::SecondPersonPlural => 'eûtes',
									Person::ThirdPersonPlural => 'eurent' 
							],
							Tense::Futur_anterieur => [ 
									Person::FirstPersonSingular => 'aurai',
									Person::SecondPersonSingular => 'auras',
									Person::ThirdPersonSingular => 'aura',
									Person::FirstPersonPlural => 'aurons',
									Person::SecondPersonPlural => 'aurez',
									Person::ThirdPersonPlural => 'auront' 
							] 
					],
					Mood::Subjonctif => [ 
							Tense::Passe => [ 
									Person::FirstPersonSingular => 'aie',
									Person::SecondPersonSingular => 'aies',
									Person::ThirdPersonSingular => 'ait',
									Person::FirstPersonPlural => 'ayons',
									Person::SecondPersonPlural => 'ayez',
									Person::ThirdPersonPlural => 'aient' 
							],
							Tense::Plus_que_parfait => [ 
									Person::FirstPersonSingular => 'eusse',
									Person::SecondPersonSingular => 'eusses',
									Person::ThirdPersonSingular => 'eût',
									Person::FirstPersonPlural => 'eussions',
									Person::SecondPersonPlural => 'eussiez',
									Person::ThirdPersonPlural => 'eussent' 
							] 
					],
					Mood::Conditionnel => [ 
							Tense::Premiere_Forme => [ 
									Person::FirstPersonSingular => 'aurais',
									Person::SecondPersonSingular => 'aurais',
									Person::ThirdPersonSingular => 'aurait',
									Person::FirstPersonPlural => 'aurions',
									Person::SecondPersonPlural => 'auriez',
									Person::ThirdPersonPlural => 'auraient' 
							],
							Tense::Deuxieme_Forme => [ 
									Person::FirstPersonSingular => 'eusse',
									Person::SecondPersonSingular => 'eusses',
									Person::ThirdPersonSingular => 'eût',
									Person::FirstPersonPlural => 'eussions',
									Person::SecondPersonPlural => 'eussiez',
									Person::ThirdPersonPlural => 'eussent' 
							] 
					],
					Mood::Imperatif => [ 
							Tense::Passe => [ 
									Person::SecondPersonSingular => 'aie',
									Person::FirstPersonPlural => 'ayons',
									Person::SecondPersonPlural => 'ayez' 
							] 
					] 
			];
			break;
	}
	if ($tense->getValue () === Tense::Futur_compose)
		return aller ( $person, $tense, $mood, $voice );
	if ($tense->getValue () === Tense::Passe_recent)
		return venir ( $person, $tense, $mood, $voice );
	if (! isComposite ( $mood, $tense ) && $voice->getValue () === Voice::Passive) 
		return etre_passive ( $person, $tense, $mood, $voice );
	if ($mood->getValue () === Mood::Imperatif && $tense->getValue () === Tense::Present && $voice->getValue () === Voice::Passive)
		return etre_passive ( $person, $tense, $mood, $voice );
	return $conjugated_auxiliaire [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];		
}
function finding_auxiliaire(InfinitiveVerb $infinitiveVerb) {
	if (in_array ( $infinitiveVerb, Auxiliaire::getVerbsThatUse ( new Auxiliaire ( Auxiliaire::Etre ) ) ))
		$auxiliaire = Auxiliaire::Etre;
	else 
		$auxiliaire = Auxiliaire::Avoir;
	return new Auxiliaire ( $auxiliaire );
}
function canBeConjugatedWith(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire) {
	return in_array ( $infinitiveVerb, Auxiliaire::getVerbsThatUse ( $auxiliaire ) ) || in_array ( $infinitiveVerb, Auxiliaire::getVerbsThatUse ( new Auxiliaire ( Auxiliaire::AvoirandEtre ) ) );
}
function isPlural(Person $person) {
	$plural_persons = [ 
			Person::FirstPersonPlural,
			Person::SecondPersonPlural,
			Person::ThirdPersonPlural 
	];
	return in_array ( $person->getValue (), $plural_persons );
}
function conjugate(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
	$endingwith = finding_infinitive_ending ( $infinitiveVerb );
	$exceptionmodel = finding_exception_model ( $infinitiveVerb );
	$conjugated_verb = word_stem ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'. ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';	
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::UIRE]) && ($mood == Indicatif && $tense == Passe || $mood == Subjonctif && $tense == Imparfait))  	
			return $conjugated_verb .= ' / ' .word_stem2 ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'.ending_re ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';	
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::FLEURIR]) && ($mood == Indicatif && $tense == Imparfait))  	
			return $conjugated_verb .= ' / ' .word_stem2 ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'.ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';
	if (($infinitiveVerb == 'saillir') && ($mood == Indicatif && (($tense == Present || $tense == Imparfait || $tense == Futur)) || (($mood == Subjonctif || $mood == Conditionnel || $mood == Imperatif) && $tense == Present ))) 	
			return $conjugated_verb .= ' / ' .word_stem_length($infinitiveVerb, 2) . '<span class="ending">'.ending_ir_with_iss ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';
	if (($infinitiveVerb == 'faillir') && ($mood == Indicatif && (($tense == Present || $tense == Imparfait)) || (($mood == Subjonctif || $mood == Imperatif) && $tense == Present )))
			return $conjugated_verb .= ' / ' .word_stem_length($infinitiveVerb, 2) . '<span class="ending">'.ending_ir_with_iss ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';			
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::CHOIR2]) && ($mood == Indicatif && ($tense == Present || $tense == Futur) || $mood == Conditionnel && $tense == Present))
			return $conjugated_verb .= ' / ' .word_stem2 ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'.ending_choir2 ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::POUVOIR]) && $mood == Indicatif && $tense == Present && $person == FirstPersonSingular)
			return $conjugated_verb .= ' / ' .word_stem ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">uis</span>';	
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::VOULOIR]) && $mood == Imperatif && $tense == Present)
			return $conjugated_verb .= ' / ' .word_stem ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'.ending_vouloir2 ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::ARGUER]) && (($mood == Indicatif || $mood == Subjonctif)&& ($tense == Present && in_array ( $person, [FirstPersonSingular,SecondPersonSingular,ThirdPersonSingular,ThirdPersonPlural]) || $tense == Futur) || $mood == Conditionnel && $tense == Present || $mood == Imperatif && $tense == Present && $person == SecondPersonSingular))
			return $conjugated_verb .= ' / ' .word_stem ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'.ending_arguer ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';		
	if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::YER_YE_IE]) && (($mood == Indicatif || $mood == Subjonctif)&& ($tense == Present && in_array ( $person, [FirstPersonSingular,SecondPersonSingular,ThirdPersonSingular,ThirdPersonPlural]) || $tense == Futur) || $mood == Conditionnel && $tense == Present || $mood == Imperatif && $tense == Present && $person == SecondPersonSingular) ) 
			return $conjugated_verb .= ' / ' .word_stem2( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'.ending_yer ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>';
	$word_stem_last_char = mb_substr ( word_stem ( $infinitiveVerb, $person, $tense, $mood ), - 1 );
	$word_stem_last_2chars = mb_substr ( word_stem ( $infinitiveVerb, $person, $tense, $mood ), - 2 );
	$ending_first_char = mb_substr ( ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ), 0, 1 );
	$i_variants = [ 'i','î','ï'];
	if (in_array ( $word_stem_last_char, $i_variants ) && in_array ( $ending_first_char, $i_variants ) && !in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::IER,ExceptionModel::E_Akut_IER,ExceptionModel::E_Akut_IIER,ExceptionModel::I_Trema_ER])) // should be replaced with static $ier + static $iier + $e_akut_ier + $i_trema_er // example used it:
		return mb_substr ( word_stem ( $infinitiveVerb, $person, $tense, $mood ), 0, - 1 ) . '<span class="ending">'. ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>'; // delete last char in word_stem
	if (in_array ( $word_stem_last_2chars, [ 'oi' ] ) && in_array ( $ending_first_char, [ 'u' ] )) // should be replaced with static $boire // example used it: $boire verbs for Indicative Passe+Subjontif Imparfait
		return mb_substr ( word_stem ( $infinitiveVerb, $person, $tense, $mood ), 0, - 2 ) . '<span class="ending">'. ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>'; // delete last char i
	if (in_array ( $word_stem_last_char, [ 'i' ] ) && in_array ( $ending_first_char, [ 'u','y' ] )) // should be replaced with static $lire // example used it: $lire verbs for Indicative Passe+Subjontif Imparfait
		return mb_substr ( word_stem ( $infinitiveVerb, $person, $tense, $mood ), 0, - 1 ) . '<span class="ending">'. ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ).'</span>'; // delete last char in word_stem
	if (in_array ( $word_stem_last_char, [ 
			'c', // used in VAINCRE
			'd', // used in COUDRE + DRE,
			't' 
	] ) && // used in VETIR
$ending_first_char == 't')
		return word_stem ( $infinitiveVerb, $person, $tense, $mood ) . '<span class="ending">'. mb_substr (ending ( $person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb ), 0, - 1 ).'</span>'; // delete ending string
	else
		return $conjugated_verb;
}
function isComposite(Mood $mood, Tense $tense) {
	$composite_tenses = [ 
			Mood::Indicatif => [ 
					Tense::Passe_compose,
					Tense::Plus_que_parfait,
					Tense::Passe_anterieur,
					Tense::Futur_anterieur,
					Tense::Futur_compose,
					Tense::Passe_recent 
			],
			Mood::Subjonctif => [ 
					Tense::Passe,
					Tense::Plus_que_parfait 
			],
			Mood::Conditionnel => [ 
					Tense::Premiere_Forme,
					Tense::Deuxieme_Forme 
			],
			Mood::Imperatif => [ 
					Tense::Passe 
			] 
	];
	return in_array ( $tense->getValue (), $composite_tenses [$mood->getValue ()] );
}
function finding_participe_present(InfinitiveVerb $infinitiveVerb) {
$participe_present = finding_infinitive_ending ( $infinitiveVerb ); // without this line Undefined variable
	if (in_array ( $participe_present->getValue (), [ EndingWith::ER,EndingWith::RE,EndingWith::OIR	]) or in_array($infinitiveVerb, IrregularExceptionGroup::$ohne_iss)) // + all unregular verbs from EndingWith::IR
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">ant</span>';
	if (finding_infinitive_ending ( $infinitiveVerb )->getValue () === EndingWith::IR && !in_array($infinitiveVerb, IrregularExceptionGroup::$ohne_iss))
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">issant</span>';
	if (finding_infinitive_ending ( $infinitiveVerb )->getValue () === EndingWith::I_TREMA_R)
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">ïssant</span>';	
	// BEGIN unregular IrregularExceptionGroup::$ohne_iss
$exceptionmodel = finding_exception_model ( $infinitiveVerb ); // without this line Undefined variable	
	if (in_array ( finding_exception_model ( $infinitiveVerb )->getValue (), [  // + all unregular verbs from EndingWith::IR
			ExceptionModel::COURIR,
			ExceptionModel::MOURIR,
			ExceptionModel::QUERIR,
			ExceptionModel::FAILLIR,
			ExceptionModel::FUIR,
			ExceptionModel::VETIR,
			ExceptionModel::ENIR			
	] ))
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">ant</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::AVOIR_IRR)	
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">ayant</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::ETRE_IRR)
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">étant</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::FLEURIR)		
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">issant</span> / ' . word_stem_length ( $infinitiveVerb, 5 ) . '<span class="unregel">or</span>' . '<span class="ending">issant</span>';
	if ($exceptionmodel->isNAITRE () || $exceptionmodel->isAITRE ())
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">aissant</span>';
	if ($exceptionmodel->isOITRE ())
		$participe_present = participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">oissant</span>';	
	if ($exceptionmodel->isBRUIRE ())
		$participe_present .= ' / '.mb_substr($infinitiveVerb, 0, -3) . '<span class="ending">yant</span>';
	if (in_array($infinitiveVerb,['faillir','saillir']))
		$participe_present .= ' / '.participe_present_word_stem ( $infinitiveVerb ) . '<span class="ending">issant</span>';	
	// END unregular	
	return $participe_present;
}
function finding_participe_passe(InfinitiveVerb $infinitiveVerb) {
	if (finding_infinitive_ending ( $infinitiveVerb )->getValue () === EndingWith::ER)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">é</span>';
	if (finding_infinitive_ending ( $infinitiveVerb )->getValue () === EndingWith::IR)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">i</span>';
	if (finding_infinitive_ending ( $infinitiveVerb )->getValue () === EndingWith::I_TREMA_R)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">ï</span>';
	if (finding_infinitive_ending ( $infinitiveVerb )->getValue () === EndingWith::RE)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">u</span>';
		// beginning unregular
	$exceptionmodel = finding_exception_model ( $infinitiveVerb ); // without this line Undefined variable
	if (in_array ( finding_exception_model ( $infinitiveVerb )->getValue (), [ 
			ExceptionModel::CHOIR,
			ExceptionModel::CHOIR2,			
			ExceptionModel::COURIR,
			ExceptionModel::VETIR,
			ExceptionModel::POUVOIR,
			ExceptionModel::SAVOIR,
			ExceptionModel::VOIR,
			ExceptionModel::RAMENTEVOIR,			
			ExceptionModel::CEVOIR,
			ExceptionModel::VALOIR,
			ExceptionModel::VOULOIR,
			ExceptionModel::ENIR,
			ExceptionModel::FALLOIR,
			ExceptionModel::PLEUVOIR 
	] ))
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">u</span>';
	if ($exceptionmodel->getValue() == ExceptionModel::DEVOIR //&& (in_array ( $infinitiveVerb, [ '??','??']))			
	 || $exceptionmodel->getValue() == ExceptionModel::OITRE && (in_array ( $infinitiveVerb, ['croitre','se concroître','croître','concroître','recroître','surcroître']))			
	 || $exceptionmodel->getValue() == ExceptionModel::MOUVOIR && (in_array ( $infinitiveVerb, ['mouvoir','se mouvoir'] )))
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">û</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::VIVRE)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">écu</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::NAITRE)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">é</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::RIR)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">ert</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::MOURIR)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">ort</span>';
	if ($exceptionmodel->isQUERIR () || $exceptionmodel->isSEOIR () || $exceptionmodel->isPRENDRE () || $exceptionmodel->isMETTRE ())
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">is</span>';
	if ($exceptionmodel->isSEOIR () && (in_array ( $infinitiveVerb, [ 'assoir','rassoir','réassoir','s’assoir','sursoir'] )))
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">sis</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::OITRE && (!in_array ( $infinitiveVerb, ['croitre','se concroître','croître','concroître','recroître','surcroître'] ))
	|| $exceptionmodel->getValue () === ExceptionModel::DEVOIR && (in_array ( $infinitiveVerb, ['entre-devoir','s’entre-devoir','redevoir'] ))		
	|| $exceptionmodel->getValue () === ExceptionModel::MOUVOIR && (!in_array ( $infinitiveVerb, ['mouvoir','se mouvoir'] ))) 
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">u</span>';	
	if ($exceptionmodel->getValue () === ExceptionModel::AVOIR_IRR)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">eu</span>';
	if ($exceptionmodel->getValue () === ExceptionModel::ETRE_IRR)
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">été</span>';
	if ($exceptionmodel->isSOUDRE () || $exceptionmodel->isOCCIRE () || $exceptionmodel->isCIRCONCIRE () || $exceptionmodel->isCLORE () || $exceptionmodel->isCLURE ()
		&& (!in_array ( $infinitiveVerb, [ 'exclure','conclure','autoexclure','auto-exclure','occlure','réocclure','réexclure','reconclure','se réocclure','s’occlure','s’auto-exclure','s’autoexclure'] ))) $participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">s</span>';
	if ($exceptionmodel->isRIRE () || $exceptionmodel->isSUFFIRE () || $exceptionmodel->isSUIVRE () || $exceptionmodel->isUIRE ())
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">i</span>';
	if ($exceptionmodel->isUIRE () &&  (!in_array ( $infinitiveVerb, [ 'luire','nuire','reluire','entreluire','entre-luire','transluire','renuire','traluire','auto-nuire','autonuire'] )))
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">it</span>';	
	if (in_array ( finding_exception_model ( $infinitiveVerb )->getValue (), [ 
			ExceptionModel::FAIRE,
			ExceptionModel::RAIRE,
			ExceptionModel::INDRE,
			ExceptionModel::OINDRE,
			ExceptionModel::DIRE,
			ExceptionModel::MAUDIRE,
			ExceptionModel::CONFIRE,
			ExceptionModel::CRIRE,
			ExceptionModel::FRIRE,
			ExceptionModel::BRUIRE 
	] ))    
		$participe_passe = participe_passe_word_stem ( $infinitiveVerb ) . '<span class="ending">t</span>';
	return $participe_passe;
}
function modes_impersonnels(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Mode $mode, Tense $tense, Gender $gender, Voice $voice, SentenceType $sentencetype) {
	$participe_present = finding_participe_present ( $infinitiveVerb );
	$participe_passe = finding_participe_passe ( $infinitiveVerb );
	$avoir_participe_present = 'ayant';
	$etre_participe_present = 'étant';
	$etre_participe_passe = 'été';
	$etre_infinitive = 'être';
	$gerondif_present = 'en ' . $participe_present;
	$gerondif_passe_etre  = 'en ' .$etre_participe_present. ' '. $participe_passe;
	$gerondif_passe_avoir = 'en ' .$avoir_participe_present.' '. $participe_passe;	
	$infinitiveVerb_passe = '<i>'.$auxiliaire->getValue () . '</i> ' . $participe_passe;
	if (($auxiliaire->getValue () === Auxiliaire::Etre || $voice->getValue () === Voice::Passive) && $gender->getValue () === Gender::Feminine)
		$participe_passe .= '<span class="ending">e</span>'; 
	if ($sentencetype->getValue () === SentenceType::DeclarativeSentence || $sentencetype->getValue () === SentenceType::InterrogativeSentence) {		
		if ($voice->getValue () === Voice::Passive) {
			if ($tense->getValue () === Tense::Present) {
				$infinitiveVerb = '<i>'.Auxiliaire::Etre . '</i> ' . $participe_passe;
				$participe_present = '<i>'.$etre_participe_present . '</i> ' . $participe_passe;
			}
			if ($tense->getValue () === Tense::Passe)
				$infinitiveVerb_passe = '<i>'.$auxiliaire->getValue () . ' ' . $etre_participe_passe . '</i> ' . $participe_passe;
		}
		if ($voice->getValue () === Voice::Pronominal) {
			if ($tense->getValue () === Tense::Present) {
				$infinitiveVerb = concatenate_apostrophized ( 'se', $infinitiveVerb );				
				$participe_present = concatenate_apostrophized ( 'se', $participe_present );
			}
			if ($tense->getValue () === Tense::Passe) {
				$gerondif_passe_etre  = 'en ' .concatenate_apostrophized ( 'se', $etre_participe_present ). ' '. $participe_passe;				
				$infinitiveVerb_passe = concatenate_apostrophized ( 'se', Auxiliaire::Etre ) . ' ' . $participe_passe;
			}				
		}
	}
	if ($sentencetype->getValue () === SentenceType::Negation) {
		if ($voice->getValue () === Voice::Active) {
			if ($tense->getValue () === Tense::Present) {
				$infinitiveVerb = 'ne pas ' . $infinitiveVerb;
				$gerondif_present = 'en ' . concatenate_apostrophized ( 'ne', $participe_present ). ' pas';				
				$participe_present = concatenate_apostrophized ( 'ne', $participe_present ) . ' ' . 'pas';
			}
			if ($tense->getValue () === Tense::Passe && $auxiliaire->getValue () === Auxiliaire::Avoir) {
				$infinitiveVerb_passe = 'ne pas ' . '<i>'.Auxiliaire::Avoir . '</i> ' .$participe_passe;
				$participe_passe = concatenate_apostrophized ( 'ne', $avoir_participe_present ) . ' pas ' . $participe_passe;
			}
			if ($tense->getValue () === Tense::Passe && $auxiliaire->getValue () === Auxiliaire::Etre ) { 
				$infinitiveVerb_passe = 'ne pas ' . '<i>'.Auxiliaire::Etre . '</i> ' .$participe_passe;
				$participe_passe = concatenate_apostrophized ( 'ne', $etre_participe_present ) . ' pas ' . $participe_passe;
			}			
		}
		if ($voice->getValue () === Voice::Passive) {
			if ($tense->getValue () === Tense::Present) {
				$infinitiveVerb = 'ne pas ' . $etre_infinitive . ' ' . $participe_passe;
				$participe_present = concatenate_apostrophized ( 'ne', $etre_participe_present ) . ' pas ' . $participe_passe;
			}
			if ($tense->getValue () === Tense::Passe) {
				$infinitiveVerb_passe = 'ne pas' . ' ' . '<i>'.$auxiliaire->getValue () . '</i> ' .$etre_participe_passe . ' ' . $participe_passe;
				$participe_passe = concatenate_apostrophized ( 'ne', $avoir_participe_present ) . ' pas ' . $etre_participe_passe . ' ' . $participe_passe;
			}
		}
		if ($voice->getValue () === Voice::Pronominal) {
			if ($tense->getValue () === Tense::Present) {
				$infinitiveVerb = 'ne pas ' . concatenate_apostrophized ( 'se', $infinitiveVerb );
				$gerondif_present = 'en ne ' . concatenate_apostrophized ( 'se', $participe_present ). ' pas';	
				$participe_present = 'ne ' . concatenate_apostrophized ( 'se', $participe_present ) . ' pas';
			}
			if ($tense->getValue () === Tense::Passe) {
				$infinitiveVerb_passe = 'ne pas ' . concatenate_apostrophized ( 'se', Auxiliaire::Etre ) . ' ' . $participe_passe;
				$gerondif_passe_etre  = 'en ne' .concatenate_apostrophized ( 'se', $etre_participe_present ). ' pas '. $participe_passe;			
				$participe_passe = 'ne ' . concatenate_apostrophized ( 'se', $etre_participe_present ) . ' pas ' . $participe_passe;
			}
		}
	}
	switch ($auxiliaire->getValue ()) {
		case Auxiliaire::Etre :
			$modes_impersonnels = [ 
					Tense::Present => [ 
							Mode::Infinitif => $infinitiveVerb,
							Mode::Participe => $participe_present,
							Mode::Gerondif => $gerondif_present 
					],
					Tense::Passe => [ 
							Mode::Infinitif => $infinitiveVerb_passe,
							Mode::Participe => $participe_passe,
							Mode::Gerondif => $gerondif_passe_etre 
					] 
			];
			break;
		case Auxiliaire::Avoir :
			$modes_impersonnels = [ 
					Tense::Present => [ 
							Mode::Infinitif => $infinitiveVerb,
							Mode::Participe => $participe_present,
							Mode::Gerondif => $gerondif_present 
					],
					Tense::Passe => [ 
							Mode::Infinitif => $infinitiveVerb_passe,
							Mode::Participe => $participe_passe,
							Mode::Gerondif => $gerondif_passe_avoir 
					] 
			];
			break;
	}
	return $modes_impersonnels [$tense->getValue ()] [$mode->getValue ()];
}
function starts_with_vowel($verb) {
	global $h_apire; 
	$french_vowels = ['a','æ','à','â','e','é','è','ê','ë','i','î','ï','o','ô','œ','u','û','ù'];
	$infinitiveVerb = ($verb instanceof ConjugatedVerb) ? $verb->getInfinitive() : $verb;
	$firstLetter = mb_substr ( $verb, 0, 1 );
	$startsWithTrueVowel = in_array ($firstLetter, $french_vowels);
	$startsWithPronouncedVowel = ((in_array ( $infinitiveVerb, $h_apire )) || $infinitiveVerb == 'ypériter'); 
	return $startsWithTrueVowel || $startsWithPronouncedVowel;
}
function apostrophized($pronoun, $verb, & $was_apostrophized = null) { 
	if ((preg_match ( '~(.*\b[jtmsnd])e$~ui', $pronoun, $m )) && (starts_with_vowel($verb))) { // should be in_array($conjugatedVerb->getInfinitive(), $h_apire) )	
		$was_apostrophized = true; // 3 failures in test with star letters y,h line 808 didn't work here 
		return "{$m[1]}’"; 
	}
	$was_apostrophized = false;
	return $pronoun;
}
function concatenate_apostrophized($pronoun, $verb) {
	$was_apostrophized = false;
	$possiblyApostrophizedPronoun = apostrophized ( $pronoun, $verb, $was_apostrophized );
	return $was_apostrophized ? $possiblyApostrophizedPronoun . $verb : "$possiblyApostrophizedPronoun $verb";
}
function euphonious_change($verb, $pronoun) {
	if (in_array ( mb_substr ( $verb, - 1 ), [ 'e','a','c' ] ) && in_array ( $pronoun, [ 'il','elle','on','ils','elles' ] ))
		return $verb . '-t';
	else
		return $verb;
}
function concatenate_euphonious_change($verb, $pronoun) {
	if (in_array ( mb_substr ( $verb, - 1 ), [ 'e','a','c' ] ) && in_array ( $pronoun, [ 'il','elle','on','ils','elles' ] ))
		return $verb . '-t-' . $pronoun;
	else
		return $verb . '-' . $pronoun;
}
abstract class ConjugationPhrase {
	abstract function accept(ConjugationPhraseVisitor $visitor);
	static function participe_ending_suffix_passive_etre(Auxiliaire $auxiliaire, Voice $voice, Gender $gender, Person $person, &$participe_passe) {
		if ($auxiliaire->getValue () === Auxiliaire::Etre || $voice->getValue () === Voice::Passive) {
			
			if ($gender->getValue () === Gender::Masculine && (isPlural ( $person )))
				$participe_passe .= '<span class="ending">s</span>';
			if ($gender->getValue () === Gender::Feminine && (! isPlural ( $person )))
				$participe_passe .= '<span class="ending">e</span>';
			if ($gender->getValue () === Gender::Feminine && (isPlural ( $person )))
				$participe_passe .= '<span class="ending">es</span>';
		}
	}	
	static function create(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype, Person $person, Tense $tense, Mood $mood) {
		$personal_pronoun = personal_pronoun ( $person, $gender, $mood );
		$reflexive_pronoun = reflexive_pronoun ( $person, $mood, $sentencetype );
		$etre_participe_passe = 'été';
		$etre_infinitive = 'être';
		if (isComposite ( $mood, $tense )) {
			$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( $auxiliaire, $person, $tense, $mood, $voice, $sentencetype );
			$participe_passe = finding_participe_passe ( $infinitiveVerb );
			ConjugationPhrase::participe_ending_suffix_passive_etre( $auxiliaire, $voice, $gender, $person, $participe_passe);
			if ($mood->getValue () === Mood::Imperatif && $voice->getValue () === Voice::Active) {
				if ($sentencetype->getValue () === SentenceType::DeclarativeSentence) 
					return new ImperatifPasseTenseConjugationPhrase ( $conjugated_auxiliaire_verb, $participe_passe );
				if ($sentencetype->getValue () === SentenceType::Negation)
					return new ImperatifPasseTenseNegationConjugationPhrase ( $conjugated_auxiliaire_verb, $participe_passe );
			}
			if ($mood->getValue () === Mood::Imperatif && $tense->getValue () === Tense::Passe)
				return new NoConjugationPhrase ();
			if ($sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Subjonctif)
				return new NoConjugationPhrase ();
			if ($sentencetype->getValue () === SentenceType::DeclarativeSentence && $voice->getValue () === Voice::Passive && $tense->getValue () != Tense::Futur_compose && $tense->getValue () != Tense::Passe_recent) 
				return new CompositeTenseinPassiveVoiceConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe );
			if ($tense->getValue () === Tense::Futur_compose) {
				if ($sentencetype->getValue () === SentenceType::DeclarativeSentence) {
					if ($voice->getValue () === Voice::Active)
						return new FuturComposeTenseConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $infinitiveVerb );
					if ($voice->getValue () === Voice::Passive)
						return new NoConjugationwithFiveTDsPhrase ();
					if ($voice->getValue () === Voice::Pronominal)
						return new FuturComposeTensePronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb,  new ReflexivePronoun($reflexive_pronoun), $infinitiveVerb );
				}
				if ($sentencetype->getValue () === SentenceType::InterrogativeSentence) {
					if ($voice->getValue () === Voice::Active)
						return new FuturComposeTenseInterrogativeActiveConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), $infinitiveVerb );
					if ($voice->getValue () === Voice::Passive)
						return new NoConjugationwithFiveTDsPhrase ();
					if ($voice->getValue () === Voice::Pronominal)
						return new FuturComposeTenseInterrogativePronominalConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), new ReflexivePronoun($reflexive_pronoun), $infinitiveVerb );
				}
				if ($sentencetype->getValue () === SentenceType::Negation) {
					if ($voice->getValue () === Voice::Active)
						return new FuturComposeTenseNegationActiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $infinitiveVerb );
					if ($voice->getValue () === Voice::Passive)
						return new NoConjugationwithFiveTDsPhrase ();
					if ($voice->getValue () === Voice::Pronominal)
						return new FuturComposeTenseNegationPronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, new ReflexivePronoun($reflexive_pronoun), $infinitiveVerb );
				}
			}
			if ($tense->getValue () === Tense::Passe_recent) {
				if ($sentencetype->getValue () === SentenceType::DeclarativeSentence) {
					if ($voice->getValue () === Voice::Active)
						return new PasseRecentTenseConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $infinitiveVerb );
					if ($voice->getValue () === Voice::Passive)
						return new NoConjugationwithFiveTDsPhrase ();
					if ($voice->getValue () === Voice::Pronominal)
						return new PasseRecentTensePronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, new ReflexivePronoun($reflexive_pronoun), $infinitiveVerb );
				}
				if ($sentencetype->getValue () === SentenceType::InterrogativeSentence) {
					if ($voice->getValue () === Voice::Active) 
						return new PasseRecentTenseInterrogativeActiveConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), $infinitiveVerb );
					if ($voice->getValue () === Voice::Passive)
						return new NoConjugationwithFiveTDsPhrase ();
					if ($voice->getValue () === Voice::Pronominal)
						return new PasseRecentTenseInterrogativePronominalConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), new ReflexivePronoun($reflexive_pronoun), $infinitiveVerb );
				}
				if ($sentencetype->getValue () === SentenceType::Negation) {
					if ($voice->getValue () === Voice::Active)
						return new PasseRecentTenseNegationActiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $infinitiveVerb );
					if ($voice->getValue () === Voice::Passive)
						return new NoConjugationwithFiveTDsPhrase ();
					if ($voice->getValue () === Voice::Pronominal)
						return new PasseRecentTenseNegationPronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, new ReflexivePronoun($reflexive_pronoun), $infinitiveVerb );
				}
			}
			if ($sentencetype->getValue () === SentenceType::DeclarativeSentence && $voice->getValue () === Voice::Pronominal) {
				return new CompositeTensePronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), new ReflexivePronoun($reflexive_pronoun), $conjugated_auxiliaire_verb, $participe_passe );
			}
			if ($sentencetype->getValue () === SentenceType::InterrogativeSentence) {
				if ($voice->getValue () === Voice::Active)
					return new CompositeTenseInterrogativeActiceConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), $participe_passe );
				if ($voice->getValue () === Voice::Passive)
					return new CompositeTenseInterrogativePassiveConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), $etre_participe_passe, $participe_passe );
				if ($voice->getValue () === Voice::Pronominal) 
					return new CompositeTenseInterrogativePronominalConjugationPhrase ( new ReflexivePronoun($reflexive_pronoun), $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), $participe_passe );
			}
			if ($sentencetype->getValue () === SentenceType::Negation) {
				if ($voice->getValue () === Voice::Active)
					return new CompositeTenseNegationActiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $participe_passe );
				if ($voice->getValue () === Voice::Passive)
					return new CompositeTenseNegationPassiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe );
				if ($voice->getValue () === Voice::Pronominal)
					return new CompositeTenseNegationPronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), new ReflexivePronoun($reflexive_pronoun), $conjugated_auxiliaire_verb, $participe_passe );
			}
			return new CompositeTenseConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $participe_passe );
		} else {
			$conjugated_verb = new ConjugatedVerb ( $infinitiveVerb, $person, $tense, $mood );
			$participe_passe = finding_participe_passe ( $infinitiveVerb );
			ConjugationPhrase::participe_ending_suffix_passive_etre( $auxiliaire, $voice, $gender, $person, $participe_passe);
			if ($mood->getValue () === Mood::Imperatif) {
				if ($sentencetype->getValue () === SentenceType::Negation) {
					if ($voice->getValue () === Voice::Active)
						return new ImperatifPresentTenseNegationActiveConjugationPhrase ( $conjugated_verb );
					if ($voice->getValue () === Voice::Passive) {
						$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( $auxiliaire, $person, $tense, $mood, $voice, $sentencetype );
						return new ImperatifPresentTenseNegationPassiveConjugationPhrase ( $conjugated_auxiliaire_verb, $conjugated_verb );
					}
					if ($voice->getValue () === Voice::Pronominal)
						return new ImperatifPresentTenseNegationPronominalConjugationPhrase ( new ReflexivePronoun($reflexive_pronoun), $conjugated_verb );
				}
				if ($sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Imperatif && $tense->getValue () === Tense::Present) {
					return new NoConjugationPhrase ();
				}
				if ($sentencetype->getValue () === SentenceType::DeclarativeSentence) {
					if ($voice->getValue () === Voice::Active)
						return new ImperatifPresentTenseConjugationPhrase ( $conjugated_verb );
					if ($voice->getValue () === Voice::Passive) {
						$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( $auxiliaire, $person, $tense, $mood, $voice, $sentencetype );
						return new ImperatifPresentTenseinPassiveVoiceConjugationPhrase ( $conjugated_auxiliaire_verb, $participe_passe );
					}
					if ($voice->getValue () === Voice::Pronominal)
						return new ImperatifPresentTensePronominalConjugationPhrase ( $conjugated_verb, new ReflexivePronoun($reflexive_pronoun) );
				}
			}
			if (! isComposite ( $mood, $tense ) && $sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Subjonctif) {
				return new NoConjugationPhrase ();
			}
			if (! isComposite ( $mood, $tense ) && $sentencetype->getValue () === SentenceType::DeclarativeSentence) {
				if ($voice->getValue () === Voice::Passive) {
					$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( $auxiliaire, $person, $tense, $mood, $voice, $sentencetype );
					return new SimpleTensesPassiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $participe_passe );
				}
				if ($voice->getValue () === Voice::Pronominal) 
					return new SimpleTensePronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), new ReflexivePronoun($reflexive_pronoun), $conjugated_verb );
			}
			if (! isComposite ( $mood, $tense ) && $sentencetype->getValue () === SentenceType::InterrogativeSentence) {
				if ($voice->getValue () === Voice::Active)
					return new SimpleTenseInterrogativeActiceConjugationPhrase ( $conjugated_verb,  new PersonalPronoun($personal_pronoun) );
				if ($voice->getValue () === Voice::Passive) {
					$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( $auxiliaire, $person, $tense, $mood, $voice, $sentencetype );
					return new SimpleTenseInterrogativePassiveConjugationPhrase ( $conjugated_auxiliaire_verb,  new PersonalPronoun($personal_pronoun), $participe_passe );
				}
				if ($voice->getValue () === Voice::Pronominal)
					return new SimpleTenseInterrogativePronominalConjugationPhrase ( new ReflexivePronoun($reflexive_pronoun), $conjugated_verb,  new PersonalPronoun($personal_pronoun) );
			}			
			if (! isComposite ( $mood, $tense ) && $sentencetype->getValue () === SentenceType::Negation) {
				if ($voice->getValue () === Voice::Active)
					return new SimpleTenseNegationActiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_verb );
				if ($voice->getValue () === Voice::Passive) {
					$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb ( $auxiliaire, $person, $tense, $mood, $voice, $sentencetype );
					return new SimpleTenseNegationPassiveConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_auxiliaire_verb, $participe_passe );
				}
				if ($voice->getValue () === Voice::Pronominal)
					return new SimpleTenseNegationPronominalConjugationPhrase (  new PersonalPronoun($personal_pronoun), new ReflexivePronoun($reflexive_pronoun), $conjugated_verb );
			}
			return new SimpleTenseConjugationPhrase (  new PersonalPronoun($personal_pronoun), $conjugated_verb );
		}
	}
}
class SimpleTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTense ( $this );
	}
	public $personal_pronoun, $conjugated_verb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedVerb $conjugated_verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class SimpleTensePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTensePronominal ( $this );
	}
	public $personal_pronoun, $reflexive_pronoun, $conjugated_verb;
	public function __construct(PersonalPronoun $personal_pronoun, ReflexivePronoun $reflexive_pronoun, ConjugatedVerb $conjugated_verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class SimpleTensesPassiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTensesPassive ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class SimpleTenseInterrogativeActiceConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTenseInterrogativeActice ( $this );
	}
	public $conjugated_verb, $personal_pronoun;
	public function __construct(ConjugatedVerb $conjugated_verb, PersonalPronoun $personal_pronoun) {
		$this->conjugated_verb = $conjugated_verb;
		$this->personal_pronoun = $personal_pronoun;
	}
}
class SimpleTenseInterrogativePassiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTenseInterrogativePassive ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $participe_passe;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, PersonalPronoun $personal_pronoun, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->participe_passe = $participe_passe;
	}
}
class SimpleTenseInterrogativePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTenseInterrogativePronominal ( $this );
	}
	public $reflexive_pronoun, $conjugated_verb, $personal_pronoun;
	public function __construct($reflexive_pronoun, ConjugatedVerb $conjugated_verb, PersonalPronoun $personal_pronoun) {
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_verb = $conjugated_verb;
		$this->personal_pronoun = $personal_pronoun;
	}
}
class SimpleTenseNegationActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTenseNegationActive ( $this );
	}
	public $personal_pronoun, $conjugated_verb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedVerb $conjugated_verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class SimpleTenseNegationPassiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTenseNegationPassive ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class SimpleTenseNegationPronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTenseNegationPronominal ( $this );
	}
	public $personal_pronoun, $reflexive_pronoun, $conjugated_verb;
	public function __construct(PersonalPronoun $personal_pronoun, ReflexivePronoun $reflexive_pronoun, ConjugatedVerb $conjugated_verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class CompositeTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTense ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseinPassiveVoiceConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseinPassiveVoice ( $this );
	}
	public $personal_pronoun, $etre_participe_passe, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->etre_participe_passe = $etre_participe_passe;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTensePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTensePronominal ( $this );
	}
	public $personal_pronoun, $reflexive_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ReflexivePronoun $reflexive_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseInterrogativeActiceConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseInterrogativeActice ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $participe_passe;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, PersonalPronoun $personal_pronoun, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseInterrogativePassiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseInterrogativePassive ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $etre_participe_passe, $participe_passe;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, PersonalPronoun $personal_pronoun, $etre_participe_passe, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->etre_participe_passe = $etre_participe_passe;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseInterrogativePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseInterrogativePronominal ( $this );
	} // me suis-je aimé
	public $reflexive_pronoun, $conjugated_auxiliaire_verb, $personal_pronoun, $participe_passe;
	public function __construct($reflexive_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, PersonalPronoun $personal_pronoun, $participe_passe) {
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseNegationActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseNegationActive ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseNegationPassiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseNegationPassive ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->etre_participe_passe = $etre_participe_passe;
		$this->participe_passe = $participe_passe;
	}
}
class CompositeTenseNegationPronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTenseNegationPronominal ( $this );
	}
	public $personal_pronoun, $reflexive_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(PersonalPronoun $personal_pronoun, ReflexivePronoun $reflexive_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class FuturComposeTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeTense ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class FuturComposeTensePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposePronominal ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $reflexive_pronoun, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $reflexive_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class FuturComposeTenseInterrogativeActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeInterrogativeActive ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $infinitiveVerb;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, PersonalPronoun $personal_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class FuturComposeTenseInterrogativePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeInterrogativePronominal ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $reflexive_pronoun, $infinitiveVerb;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, PersonalPronoun $personal_pronoun, ReflexivePronoun $reflexive_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class FuturComposeTenseNegationActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeNegationActive ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class FuturComposeTenseNegationPronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeNegationPronominal ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $reflexive_pronoun, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, ReflexivePronoun $reflexive_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class PasseRecentTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitPasseRecent ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class PasseRecentTensePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitPasseRecentPronominal ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $reflexive_pronoun, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, ReflexivePronoun $reflexive_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class PasseRecentTenseInterrogativeActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitPasseRecentInterrogativeActive ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $infinitiveVerb;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb,PersonalPronoun $personal_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class PasseRecentTenseInterrogativePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitPasseRecentInterrogativePronominal ( $this );
	}
	public $conjugated_auxiliaire_verb, $personal_pronoun, $reflexive_pronoun, $infinitiveVerb;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb,PersonalPronoun $personal_pronoun, ReflexivePronoun $reflexive_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->infinitiveVerb = $infinitiveVerb; // vient-il de s'aimer ?
	}
}
class PasseRecentTenseNegationActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitPasseRecentNegationActive ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class PasseRecentTenseNegationPronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitPasseRecentNegationPronominal ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $reflexive_pronoun, $infinitiveVerb;
	public function __construct(PersonalPronoun $personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, ReflexivePronoun $reflexive_pronoun, InfinitiveVerb $infinitiveVerb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->infinitiveVerb = $infinitiveVerb;
	}
}
class ImperatifPresentTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentTense ( $this );
	}
	public $conjugated_verb;
	public function __construct(ConjugatedVerb $conjugated_verb) {
		$this->conjugated_verb = $conjugated_verb;
	}
}
class ImperatifPresentTenseinPassiveVoiceConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentTenseinPassiveVoice ( $this );
	}
	public $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class ImperatifPresentTensePronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentTensePronominal ( $this );
	}
	public $conjugated_verb, $reflexive_pronoun;
	public function __construct(ConjugatedVerb $conjugated_verb, ReflexivePronoun $reflexive_pronoun) {
		$this->conjugated_verb = $conjugated_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;
	}
}
class ImperatifPresentTenseNegationActiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentNegationActive ( $this );
	}
	public $conjugated_verb;
	public function __construct(ConjugatedVerb $conjugated_verb) {
		$this->conjugated_verb = $conjugated_verb;
	}
}
class ImperatifPresentTenseNegationPassiveConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentNegationPassive ( $this );
	}
	public $conjugated_auxiliaire_verb, $conjugated_verb;
	public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, ConjugatedVerb $conjugated_verb) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class ImperatifPresentTenseNegationPronominalConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentNegationPronominal ( $this );
	}
	public $reflexive_pronoun, $conjugated_verb;
	public function __construct(ReflexivePronoun $reflexive_pronoun, ConjugatedVerb $conjugated_verb) {
		$this->reflexive_pronoun = $reflexive_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class ImperatifPasseTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPasse ( $this );
	}
	public $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct($conjugated_auxiliaire_verb, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class ImperatifPasseTenseNegationConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPasseNegation ( $this );
	}
	public $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct($conjugated_auxiliaire_verb, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class NoConjugationPhrase extends ConjugationPhrase { // should only print '-'
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitNotExisting ( $this );
	}
}
class NoConjugationwithFiveTDsPhrase extends ConjugationPhrase { // should only print '-'
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitNotExistingwithFiveTDs ( $this );
	}
}
abstract class ConjugationPhraseVisitor {
	abstract function visitSimpleTense(SimpleTenseConjugationPhrase $visitee);
	abstract function visitSimpleTensesPassive(SimpleTensesPassiveConjugationPhrase $visitee);
	abstract function visitSimpleTensePronominal(SimpleTensePronominalConjugationPhrase $visitee);
	abstract function visitSimpleTenseInterrogativeActice(SimpleTenseInterrogativeActiceConjugationPhrase $visitee);
	abstract function visitSimpleTenseInterrogativePassive(SimpleTenseInterrogativePassiveConjugationPhrase $visitee);
	abstract function visitSimpleTenseInterrogativePronominal(SimpleTenseInterrogativePronominalConjugationPhrase $visitee);
	abstract function visitSimpleTenseNegationActive(SimpleTenseNegationActiveConjugationPhrase $visitee);
	abstract function visitSimpleTenseNegationPassive(SimpleTenseNegationPassiveConjugationPhrase $visitee);
	abstract function visitSimpleTenseNegationPronominal(SimpleTenseNegationPronominalConjugationPhrase $visitee);
	abstract function visitCompositeTense(CompositeTenseConjugationPhrase $visitee);
	abstract function visitCompositeTensePronominal(CompositeTensePronominalConjugationPhrase $visitee);
	abstract function visitCompositeTenseinPassiveVoice(CompositeTenseinPassiveVoiceConjugationPhrase $visitee);
	abstract function visitCompositeTenseInterrogativeActice(CompositeTenseInterrogativeActiceConjugationPhrase $visitee);
	abstract function visitCompositeTenseInterrogativePassive(CompositeTenseInterrogativePassiveConjugationPhrase $visitee);
	abstract function visitCompositeTenseInterrogativePronominal(CompositeTenseInterrogativePronominalConjugationPhrase $visitee);
	abstract function visitCompositeTenseNegationActive(CompositeTenseNegationActiveConjugationPhrase $visitee);
	abstract function visitCompositeTenseNegationPassive(CompositeTenseNegationPassiveConjugationPhrase $visitee);
	abstract function visitCompositeTenseNegationPronominal(CompositeTenseNegationPronominalConjugationPhrase $visitee);
	abstract function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee);
	abstract function visitFuturComposePronominal(FuturComposeTensePronominalConjugationPhrase $visitee);
	abstract function visitFuturComposeInterrogativeActive(FuturComposeTenseInterrogativeActiveConjugationPhrase $visitee);
	abstract function visitFuturComposeInterrogativePronominal(FuturComposeTenseInterrogativePronominalConjugationPhrase $visitee);
	abstract function visitFuturComposeNegationActive(FuturComposeTenseNegationActiveConjugationPhrase $visitee);
	abstract function visitFuturComposeNegationPronominal(FuturComposeTenseNegationPronominalConjugationPhrase $visitee);
	abstract function visitPasseRecent(PasseRecentTenseConjugationPhrase $visitee);
	abstract function visitPasseRecentPronominal(PasseRecentTensePronominalConjugationPhrase $visitee);
	abstract function visitPasseRecentInterrogativeActive(PasseRecentTenseInterrogativeActiveConjugationPhrase $visitee);
	abstract function visitPasseRecentInterrogativePronominal(PasseRecentTenseInterrogativePronominalConjugationPhrase $visitee);
	abstract function visitPasseRecentNegationActive(PasseRecentTenseNegationActiveConjugationPhrase $visitee);
	abstract function visitPasseRecentNegationPronominal(PasseRecentTenseNegationPronominalConjugationPhrase $visitee);
	abstract function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee);
	abstract function visitImperatifPresentTenseinPassiveVoice(ImperatifPresentTenseinPassiveVoiceConjugationPhrase $visitee);
	abstract function visitImperatifPresentTensePronominal(ImperatifPresentTensePronominalConjugationPhrase $visitee);
	abstract function visitImperatifPresentNegationActive(ImperatifPresentTenseNegationActiveConjugationPhrase $visitee);
	abstract function visitImperatifPresentNegationPassive(ImperatifPresentTenseNegationPassiveConjugationPhrase $visitee);
	abstract function visitImperatifPresentNegationPronominal(ImperatifPresentTenseNegationPronominalConjugationPhrase $visitee);
	abstract function visitImperatifPasse(ImperatifPasseTenseConjugationPhrase $visitee);
	abstract function visitImperatifPasseNegation(ImperatifPasseTenseNegationConjugationPhrase $visitee);
	abstract function visitNotExisting(NoConjugationPhrase $visitee);
	abstract function visitNotExistingwithFiveTDs(NoConjugationwithFiveTDsPhrase $visitee);
}
class GoogleTTSConjugationPhraseVisitor extends ConjugationPhraseVisitor {
	function visitSimpleTense(SimpleTenseConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_verb ));
	}
	function visitSimpleTensesPassive(SimpleTensesPassiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . $visitee->participe_passe);
	}
	function visitSimpleTensePronominal(SimpleTensePronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ));
	}
	function visitSimpleTenseInterrogativeActice(SimpleTenseInterrogativeActiceConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_verb, $visitee->personal_pronoun ) . ' ?');
	}
	function visitSimpleTenseInterrogativePassive(SimpleTenseInterrogativePassiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . $visitee->participe_passe . ' ?');
	}
	function visitSimpleTenseInterrogativePronominal(SimpleTenseInterrogativePronominalConjugationPhrase $visitee) {
		return strip_tags( apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . ' ' . concatenate_euphonious_change ( $visitee->conjugated_verb, $visitee->personal_pronoun ) . ' ?');
	}
	function visitSimpleTenseNegationActive(SimpleTenseNegationActiveConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_verb ) . ' pas');
	}
	function visitSimpleTenseNegationPassive(SimpleTenseNegationPassiveConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas ' . $visitee->participe_passe);
	}
	function visitSimpleTenseNegationPronominal(SimpleTenseNegationPronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ne ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . ' pas');
	}
	function visitCompositeTense(CompositeTenseConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . $visitee->participe_passe);
	}
	function visitCompositeTenseinPassiveVoice(CompositeTenseinPassiveVoiceConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . $visitee->etre_participe_passe . ' ' . $visitee->participe_passe);
	}
	function visitCompositeTensePronominal(CompositeTensePronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . $visitee->participe_passe);
	}
	function visitCompositeTenseInterrogativeActice(CompositeTenseInterrogativeActiceConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . $visitee->participe_passe . ' ?');
	}
	function visitCompositeTenseInterrogativePassive(CompositeTenseInterrogativePassiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . $visitee->etre_participe_passe . ' ' . $visitee->participe_passe . ' ?');
	} // a-t-il
	function visitCompositeTenseInterrogativePronominal(CompositeTenseInterrogativePronominalConjugationPhrase $visitee) {
		return strip_tags( apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . $visitee->participe_passe . ' ?');
	} // se sera-t-il
	function visitCompositeTenseNegationActive(CompositeTenseNegationActiveConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . $visitee->participe_passe);
	}
	function visitCompositeTenseNegationPassive(CompositeTenseNegationPassiveConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . $visitee->etre_participe_passe . ' ' . $visitee->participe_passe);
	}
	function visitCompositeTenseNegationPronominal(CompositeTenseNegationPronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ne ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . $visitee->participe_passe);
	}
	function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->infinitiveVerb);
	}
	function visitFuturComposePronominal(FuturComposeTensePronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ));
	}
	function visitFuturComposeInterrogativeActive(FuturComposeTenseInterrogativeActiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . $visitee->infinitiveVerb . ' ?');
	}
	function visitFuturComposeInterrogativePronominal(FuturComposeTenseInterrogativePronominalConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . ' ?');
	}
	function visitFuturComposeNegationActive(FuturComposeTenseNegationActiveConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . $visitee->infinitiveVerb);
	}
	function visitFuturComposeNegationPronominal(FuturComposeTenseNegationPronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ));
	}
	function visitPasseRecent(PasseRecentTenseConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . concatenate_apostrophized ( 'de', $visitee->infinitiveVerb ));
	}
	function visitPasseRecentPronominal(PasseRecentTensePronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' de ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ));
	}
	function visitPasseRecentInterrogativeActive(PasseRecentTenseInterrogativeActiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' ' . concatenate_apostrophized ( 'de', $visitee->infinitiveVerb ) . ' ?');
	}
	function visitPasseRecentInterrogativePronominal(PasseRecentTenseInterrogativePronominalConjugationPhrase $visitee) {
		return strip_tags( concatenate_euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . ' de ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . ' ?');
	}
	function visitPasseRecentNegationActive(PasseRecentTenseNegationActiveConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . concatenate_apostrophized ( 'de', $visitee->infinitiveVerb ));
	}
	function visitPasseRecentNegationPronominal(PasseRecentTenseNegationPronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->personal_pronoun . ' ' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas de ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ));
	}
	function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee) {
		return strip_tags( $visitee->conjugated_verb);
	}
	function visitImperatifPresentTenseinPassiveVoice(ImperatifPresentTenseinPassiveVoiceConjugationPhrase $visitee) {
		return strip_tags( $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->participe_passe);
	}
	function visitImperatifPresentTensePronominal(ImperatifPresentTensePronominalConjugationPhrase $visitee) {
		return strip_tags( $visitee->conjugated_verb . $visitee->reflexive_pronoun);
	}
	function visitImperatifPresentNegationActive(ImperatifPresentTenseNegationActiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas');
	}
	function visitImperatifPresentNegationPassive(ImperatifPresentTenseNegationPassiveConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas' . ' ' . $visitee->conjugated_verb);
	}
	function visitImperatifPresentNegationPronominal(ImperatifPresentTenseNegationPronominalConjugationPhrase $visitee) {
		return strip_tags( 'ne' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . ' pas');
	}
	function visitImperatifPasse(ImperatifPasseTenseConjugationPhrase $visitee) {
		return strip_tags( $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->participe_passe);
	}
	function visitImperatifPasseNegation(ImperatifPasseTenseNegationConjugationPhrase $visitee) {
		return strip_tags( concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas ' . $visitee->participe_passe);
	}
	function visitNotExisting(NoConjugationPhrase $visitee) {
		return '-';
	}
	function visitNotExistingwithFiveTDs(NoConjugationwithFiveTDsPhrase $visitee) {
		return '-';
	}
}
function conjugation_phrase(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype, Person $person, Tense $tense, Mood $mood) {
	$conjugationPhrase = ConjugationPhrase::create ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, $person, $tense, $mood );
	$visitor = new GoogleTTSConjugationPhraseVisitor ();
	return $conjugationPhrase->accept ( $visitor );
}
?>