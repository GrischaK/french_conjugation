<?php
require_once '../conjugate.php';

class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider regularVerbProvider
     */
    public function testRegularVerb($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function regularVerbProvider()
    {
        ;
        return [
            [
                'aime',
                'aimer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],          
            [
                'aimes',
                'aimer',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'aime',
                'aimer',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'aimons',
                'aimer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'aimez',
                'aimer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'aiment',
                'aimer',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'aime',
                'aimer',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'aimons',
                'aimer',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'aimez',
                'aimer',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ],
            
            [
                'argüe',
                'argüer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'argües',
                'argüer',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'argüe',
                'argüer',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'argüons',
                'argüer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'argüez',
                'argüer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'argüent',
                'argüer',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'argüe',
                'argüer',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'argüons',
                'argüer',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'argüez',
                'argüer',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ],
            
            [
                'tue',
                'tuer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'tues',
                'tuer',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'tue',
                'tuer',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'tuons',
                'tuer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'tuez',
                'tuer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'tuent',
                'tuer',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'tue',
                'tuer',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'tuons',
                'tuer',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'tuez',
                'tuer',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ],
            
            [
                'donne',
                'donner',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'donnes',
                'donner',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'donne',
                'donner',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'donnons',
                'donner',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'donnez',
                'donner',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'donnent',
                'donner',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ]
        ];
    }
    // UNREGULAR EXCEPTION MODELS
    
    /**
     * @dataProvider ALLER_Provider
     */
    public function testALLER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function ALLER_Provider()
    {
        return [
            
            [
                'vais',
                'aller',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'vas',
                'aller',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'va',
                'aller',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'allons',
                'aller',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'allez',
                'aller',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'vont',
                'aller',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [ // regular
                'allai',
                'aller',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [
                'irai',
                'aller',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'iras',
                'aller',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'ira',
                'aller',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'irons',
                'aller',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'irez',
                'aller',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'iront',
                'aller',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'aille',
                'aller',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'ailles',
                'aller',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'aille',
                'aller',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'allions',
                'aller',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'alliez',
                'aller',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'aillent',
                'aller',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'allasse',
                'aller',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            
            [
                'irais',
                'aller',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'irais',
                'aller',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'irait',
                'aller',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'irions',
                'aller',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'iriez',
                'aller',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'iraient',
                'aller',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'va',
                'aller',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [ // regular
                'allons',
                'aller',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [ // regular
                'allez',
                'aller',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ],
            
            [
                're-vais',
                're-aller',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [
                's’en vais', // should later be m’...
                's’en aller',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [
                'sur-vais',
                'sur-aller',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'sur-allons',
                'sur-aller',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'sur-irais',
                'sur-aller',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            
            [
                'revais',
                'raller',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'revas',
                'raller',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'reva',
                'raller',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'rallons',
                'raller',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'rallez',
                'raller',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'revont',
                'raller',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'reva',
                'raller',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [ // regular
                'rallons',
                'raller',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [ // regular
                'rallez',
                'raller',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ]
        ];
    }  
    /**
     * @dataProvider Eler_Eler_Provider
     */
    public function testEler_Eler_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Eler_Eler_Provider()
    {
        return [
            [
                'pèle',
                'peler',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'pèles',
                'peler',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'pèle',
                'peler',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'pelons',
                'peler',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'pelez',
                'peler',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'pèlent',
                'peler',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'pèlerai',
                'peler',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'pèleras',
                'peler',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'pèlera',
                'peler',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'pèlerons',
                'peler',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'pèlerez',
                'peler',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'pèleront',
                'peler',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'pèle',
                'peler',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'pèles',
                'peler',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'pèle',
                'peler',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'pelions',
                'peler',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'peliez',
                'peler',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'pèlent',
                'peler',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'pèlerais',
                'peler',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'pèlerais',
                'peler',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'pèlerait',
                'peler',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'pèlerions',
                'peler',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'pèleriez',
                'peler',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'pèleraient',
                'peler',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'pèle',
                'peler',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Eter_Eter_Provider
     */
    public function testEter_Eter_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Eter_Eter_Provider()
    {
        return [
            [
                'achète',
                'acheter',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'achètes',
                'acheter',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'achète',
                'acheter',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'achetons',
                'acheter',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'achetez',
                'acheter',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'achètent',
                'acheter',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'achèterai',
                'acheter',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'achèteras',
                'acheter',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'achètera',
                'acheter',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'achèterons',
                'acheter',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'achèterez',
                'acheter',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'achèteront',
                'acheter',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'achète',
                'acheter',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'achètes',
                'acheter',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'achète',
                'acheter',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'achetions',
                'acheter',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'achetiez',
                'acheter',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'achètent',
                'acheter',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'achèterais',
                'acheter',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'achèterais',
                'acheter',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'achèterait',
                'acheter',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'achèterions',
                'acheter',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'achèteriez',
                'acheter',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'achèteraient',
                'acheter',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'achète',
                'acheter',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Eler_Elle_Provider
     */
    public function testEler_Eller_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Eler_Elle_Provider()
    {
        return [
            [
                'appelle',
                'appeler',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'appelles',
                'appeler',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'appelle',
                'appeler',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'appelons',
                'appeler',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'appelez',
                'appeler',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'appellent',
                'appeler',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'appellerai',
                'appeler',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'appelleras',
                'appeler',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'appellera',
                'appeler',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'appellerons',
                'appeler',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'appellerez',
                'appeler',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'appelleront',
                'appeler',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'appelle',
                'appeler',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'appelles',
                'appeler',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'appelle',
                'appeler',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'appelions',
                'appeler',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'appeliez',
                'appeler',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'appellent',
                'appeler',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'appellerais',
                'appeler',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'appellerais',
                'appeler',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'appellerait',
                'appeler',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'appellerions',
                'appeler',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'appelleriez',
                'appeler',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'appelleraient',
                'appeler',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'appelle',
                'appeler',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Eter_Ette_Provider
     */
    public function testEter_Ette_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Eter_Ette_Provider()
    {
        return [
            [
                'jette',
                'jeter',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'jettes',
                'jeter',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'jette',
                'jeter',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'jetons',
                'jeter',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'jetez',
                'jeter',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'jettent',
                'jeter',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'jetterai',
                'jeter',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'jetteras',
                'jeter',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'jettera',
                'jeter',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'jetterons',
                'jeter',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'jetterez',
                'jeter',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'jetteront',
                'jeter',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'jette',
                'jeter',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'jettes',
                'jeter',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'jette',
                'jeter',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'jetions',
                'jeter',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'jetiez',
                'jeter',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'jettent',
                'jeter',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'jetterais',
                'jeter',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'jetterais',
                'jeter',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'jetterait',
                'jeter',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'jetterions',
                'jeter',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'jetteriez',
                'jeter',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'jetteraient',
                'jeter',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'jette',
                'jeter',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider IER_Provider
     */
    public function testIER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function IER_Provider()
    {
        return [
            [ // regular double-i
                'abriions',
                'abrier',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular double-i
                'abriiez',
                'abrier',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // regular double-i
                'abriions',
                'abrier',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular double-i
                'abriiez',
                'abrier',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            
            [ // regular double-i
                'rocouiions',
                'rocouier',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular double-i
                'rocouiiez',
                'rocouier',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // regular double-i
                'rocouiions',
                'rocouier',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular double-i
                'rocouiiez',
                'rocouier',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            
            [ // -iller regular, because no doubling i possibilities
                'paillions',
                'pailler',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // -iller regular, because no doubling i possibilities
                'pailliez',
                'pailler',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // -iller regular, because no doubling i possibilities
                'paillions',
                'pailler',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // -iller regular, because no doubling i possibilities
                'pailliez',
                'pailler',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ]
        ];
    }

    /**
     * @dataProvider I_Trema_ER_Provider
     */
    public function testI_Trema_ER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function I_Trema_ER_Provider()
    {
        return [
            [ // regular double-i
                'paranoïions',
                'paranoïer',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular double-i
                'paranoïiez',
                'paranoïer',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // regular double-i
                'paranoïions',
                'paranoïer',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular double-i
                'paranoïiez',
                'paranoïer',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ]
        ];
    }

    /**
     * @dataProvider CER_Provider
     */
    public function testCER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function CER_Provider()
    {
        return [
            /* ExceptionModel::E_Akut_CER */
            [
                'apièce',
                'apiécer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'apiéçons',
                'apiécer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            /* ExceptionModel::E_Akut_GER */            
            [
                'agrège',
                'agréger',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'agrégeons',
                'agréger',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            /* ExceptionModel::E_Akut_IER */
            [ // ending éer is regular without any E_Akut_XXX rule
                'planchéie',
                'planchéier',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // ending éer is regular without any E_Akut_XXX rule
                'planchéions',
                'planchéier',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // ending éer is regular without any E_Akut_XXX rule + regular double-i
                'planchéiions',
                'planchéier',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // ending éer is regular without any E_Akut_XXX rule + regular double-i
                'planchéiiez',
                'planchéier',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // ending éer is regular without any E_Akut_XXX rule + regular double-i
                'planchéiions',
                'planchéier',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // ending éer is regular without any E_Akut_XXX rule + regular double-i
                'planchéiiez',
                'planchéier',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],  
            /* ExceptionModel::E_Akut_YER */
            [
                'abrèye',
                'abréyer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'abréyons',
                'abréyer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            /* éer */           
            [ // ending éer is regular without any E_Akut_XXX rule
                'agrée',
                'agréer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // ending éer is regular without any E_Akut_XXX rule
                'agréons',
                'agréer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
/* end E_Akut_CER/GER etc. */
            [
                'agaçons',
                'agacer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'agacez',
                'agacer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'agaçais',
                'agacer',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'agaçais',
                'agacer',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'agaçait',
                'agacer',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'agacions',
                'agacer',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'agaciez',
                'agacer',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'agaçaient',
                'agacer',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'agaçai',
                'agacer',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'agaças',
                'agacer',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'agaça',
                'agacer',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'agaçâmes',
                'agacer',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'agaçâtes',
                'agacer',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'agacèrent',
                'agacer',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'agaçasse',
                'agacer',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'agaçasses',
                'agacer',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'agaçât',
                'agacer',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'agaçassions',
                'agacer',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'agaçassiez',
                'agacer',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'agaçassent',
                'agacer',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'agaçons',
                'agacer',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider GER_Provider
     */
    public function testGER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function GER_Provider()
    {
        return [
            [
                'mangeons',
                'manger',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'mangez',
                'manger',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'mangeais',
                'manger',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'mangeais',
                'manger',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'mangeait',
                'manger',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'mangions',
                'manger',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'mangiez',
                'manger',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'mangeaient',
                'manger',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'mangeai',
                'manger',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'mangeas',
                'manger',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'mangea',
                'manger',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'mangeâmes',
                'manger',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'mangeâtes',
                'manger',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'mangèrent',
                'manger',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'mangeasse',
                'manger',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'mangeasses',
                'manger',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'mangeât',
                'manger',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'mangeassions',
                'manger',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'mangeassiez',
                'manger',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'mangeassent',
                'manger',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'mangeons',
                'manger',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ]
        ];
    }
    /**
     * @dataProvider YER_Provider
     */
    public function testYER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
        $this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb ( $infinitiveVerb ), new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ) ) );
    }
    public function YER_Provider() {
        return [
            [
            'essuye / essuie',
            'essuyer',
            'Present',
            'FirstPersonSingular',
            'Indicatif'
                ],
            [
            'noye / noie',
            'noyer',
            'Present',
            'FirstPersonSingular',
            'Indicatif'
                ],            
            [
                'paye / paie',
                'payer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'payes / paies',
                'payer',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'paye / paie',
                'payer',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [// only regular form
                'payons',
                'payer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [// only regular form
                'payez',
                'payer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'payent / paient',
                'payer',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
    
            [ // only regular form
                'payai',
                'payer',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
    
            [
                'payerai / paierai',
                'payer',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'payeras / paieras',
                'payer',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'payera / paiera',
                'payer',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
    
            [
                'payerons / paierons',
                'payer',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'payerez / paierez',
                'payer',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'payeront / paieront',
                'payer',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
    
            [
                'paye / paie',
                'payer',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'payes / paies',
                'payer',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'paye / paie',
                'payer',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [// only regular form
                'payions',
                'payer',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [// only regular form
                'payiez',
                'payer',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'payent / paient',
                'payer',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            [// only regular form
                'payasse',
                'payer',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
    
            [
                'payerais / paierais',
                'payer',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'payerais / paierais',
                'payer',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'payerait / paierait',
                'payer',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'payerions / paierions',
                'payer',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'payeriez / paieriez',
                'payer',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'payeraient / paieraient',
                'payer',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
    
            [
                'paye / paie',
                'payer',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }
    /**
     * @dataProvider E_Akut_ER_Provider
     */
    public function testE_Akut_ER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function E_Akut_ER_Provider()
    {
        return [
            [
                'mangeons',
                'manger',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'agaçons',
                'agacer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'redégénère',
                'redégénérer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'sèche',
                'sécher',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'espère',
                'espérer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'accélère',
                'accélérer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'accélères',
                'accélérer',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'accélère',
                'accélérer',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'accélérons',
                'accélérer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'accélérez',
                'accélérer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'accélèrent',
                'accélérer',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'accélèrerai',
                'accélérer',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'accélèreras',
                'accélérer',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'accélèrera',
                'accélérer',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'accélèrerons',
                'accélérer',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'accélèrerez',
                'accélérer',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'accélèreront',
                'accélérer',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'accélère',
                'accélérer',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'accélères',
                'accélérer',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'accélère',
                'accélérer',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'accélérions',
                'accélérer',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'accélériez',
                'accélérer',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'accélèrent',
                'accélérer',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'accélèrerais',
                'accélérer',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'accélèrerais',
                'accélérer',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'accélèrerait',
                'accélérer',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'accélèrerions',
                'accélérer',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'accélèreriez',
                'accélérer',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'accélèreraient',
                'accélérer',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'accélère',
                'accélérer',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider E_Er_Provider
     */
    public function testE_Er_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function E_Er_Provider()
    {
        return [
            
            [
                'pèse',
                'peser',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'pèses',
                'peser',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'pèse',
                'peser',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'pesons',
                'peser',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'pesez',
                'peser',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'pèsent',
                'peser',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'pèserai',
                'peser',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'pèseras',
                'peser',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'pèsera',
                'peser',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'pèserons',
                'peser',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'pèserez',
                'peser',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'pèseront',
                'peser',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'pèse',
                'peser',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'pèses',
                'peser',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'pèse',
                'peser',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'pesions',
                'peser',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'pesiez',
                'peser',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'pèsent',
                'peser',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'pèserais',
                'peser',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'pèserais',
                'peser',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'pèserait',
                'peser',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'pèserions',
                'peser',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'pèseriez',
                'peser',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'pèseraient',
                'peser',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'pèse',
                'peser',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Envoyer_Provider
     */
    public function testEnvoyer_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Envoyer_Provider()
    {
        return [
            [
                'envoie',
                'envoyer',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'envoies',
                'envoyer',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'envoie',
                'envoyer',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'envoyons',
                'envoyer',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'envoyez',
                'envoyer',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'envoient',
                'envoyer',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'enverrai',
                'envoyer',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'enverras',
                'envoyer',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'enverra',
                'envoyer',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'enverrons',
                'envoyer',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'enverrez',
                'envoyer',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'enverront',
                'envoyer',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'envoie',
                'envoyer',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'envoies',
                'envoyer',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'envoie',
                'envoyer',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'envoyions',
                'envoyer',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'envoyiez',
                'envoyer',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'envoient',
                'envoyer',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'enverrais',
                'envoyer',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'enverrais',
                'envoyer',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'enverrait',
                'envoyer',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'enverrions',
                'envoyer',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'enverriez',
                'envoyer',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'enverraient',
                'envoyer',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'envoie',
                'envoyer',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Devoir_Provider
     */
    public function testDevoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Devoir_Provider()
    {
        return [
            [
                'dois',
                'devoir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'dois',
                'devoir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'doit',
                'devoir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devons',
                'devoir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devez',
                'devoir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'doivent',
                'devoir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devais',
                'devoir',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devais',
                'devoir',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devait',
                'devoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devions',
                'devoir',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'deviez',
                'devoir',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'devaient',
                'devoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'dus',
                'devoir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'dus',
                'devoir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'dut',
                'devoir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'dûmes',
                'devoir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'dûtes',
                'devoir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'durent',
                'devoir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'durent',
                'devoir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [ // with word_stem_ending_oir + changed oir ending
                'devrai',
                'devoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devras',
                'devoir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devra',
                'devoir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [ // with word_stem_ending_oir + changed oir ending
                'devrons',
                'devoir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devrez',
                'devoir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devront',
                'devoir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'doive',
                'devoir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'doives',
                'devoir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'doive',
                'devoir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_oir
                'devions',
                'devoir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_oir
                'deviez',
                'devoir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'doivent',
                'devoir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // with word_stem_ending_mouvoir + changed oir ending
                'dusse',
                'devoir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'dusses',
                'devoir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'dût',
                'devoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'dussions',
                'devoir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'dussiez',
                'devoir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'dussent',
                'devoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // with word_stem_ending_oir + changed oir ending
                'devrais',
                'devoir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devrais',
                'devoir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devrait',
                'devoir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devrions',
                'devoir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devriez',
                'devoir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'devraient',
                'devoir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'dois',
                'devoir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Mouvoir_Provider
     */
    public function testMouvoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Mouvoir_Provider()
    {
        return [
            [
                'meus',
                'mouvoir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'meus',
                'mouvoir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'meut',
                'mouvoir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvons',
                'mouvoir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvez',
                'mouvoir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'meuvent',
                'mouvoir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvais',
                'mouvoir',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvais',
                'mouvoir',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvait',
                'mouvoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvions',
                'mouvoir',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouviez',
                'mouvoir',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'mouvaient',
                'mouvoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'mus',
                'mouvoir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'mus',
                'mouvoir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'mut',
                'mouvoir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'mûmes',
                'mouvoir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'mûtes',
                'mouvoir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'murent',
                'mouvoir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrai',
                'mouvoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvras',
                'mouvoir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvra',
                'mouvoir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrons',
                'mouvoir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrez',
                'mouvoir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvront',
                'mouvoir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'meuve',
                'mouvoir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'meuves',
                'mouvoir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'meuve',
                'mouvoir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_oir
                'mouvions',
                'mouvoir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_oir
                'mouviez',
                'mouvoir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'meuvent',
                'mouvoir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // with word_stem_ending_mouvoir + changed oir ending
                'musse',
                'mouvoir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'musses',
                'mouvoir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'mût',
                'mouvoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'mussions',
                'mouvoir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'mussiez',
                'mouvoir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'mussent',
                'mouvoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrais',
                'mouvoir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrais',
                'mouvoir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrait',
                'mouvoir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvrions',
                'mouvoir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvriez',
                'mouvoir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'mouvraient',
                'mouvoir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'meus',
                'mouvoir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Pouvoir_Provider
     */
    public function testPouvoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Pouvoir_Provider()
    {
        return [
            [
                'peux',
                'pouvoir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'peux',
                'pouvoir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'peut',
                'pouvoir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvons',
                'pouvoir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvez',
                'pouvoir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'peuvent',
                'pouvoir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvais',
                'pouvoir',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvais',
                'pouvoir',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvait',
                'pouvoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvions',
                'pouvoir',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouviez',
                'pouvoir',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'pouvaient',
                'pouvoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'pus',
                'pouvoir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'pus',
                'pouvoir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'put',
                'pouvoir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'pûmes',
                'pouvoir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'pûtes',
                'pouvoir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'purent',
                'pouvoir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // word_stem pour + changed oir ending
                'pourrai',
                'pouvoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // word_stem pour + changed oir ending
                'pourras',
                'pouvoir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // word_stem pour + changed oir ending
                'pourra',
                'pouvoir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [ // word_stem pour + changed oir ending
                'pourrons',
                'pouvoir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // word_stem pour + changed oir ending
                'pourrez',
                'pouvoir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // word_stem pour + changed oir ending
                'pourront',
                'pouvoir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'puisse',
                'pouvoir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'puisses',
                'pouvoir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'puisse',
                'pouvoir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'puissions',
                'pouvoir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'puissiez',
                'pouvoir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'puissent',
                'pouvoir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // with word_stem_ending_mouvoir + changed oir ending
                'pusse',
                'pouvoir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'pusses',
                'pouvoir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'pût',
                'pouvoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // word_stem pour + changed oir ending
                'pussions',
                'pouvoir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // word_stem pour + changed oir ending
                'pussiez',
                'pouvoir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [ // word_stem pour + changed oir ending
                'pussent',
                'pouvoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // word_stem pour + changed oir ending
                'pourrais',
                'pouvoir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [ // word_stem pour + changed oir ending
                'pourrais',
                'pouvoir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [ // word_stem pour + changed oir ending
                'pourrait',
                'pouvoir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'pourrions',
                'pouvoir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'pourriez',
                'pouvoir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [ // with word_stem_ending_oir + changed oir ending
                'pourraient',
                'pouvoir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ]
        ];
    }

    /**
     * @dataProvider RIR_Provider
     */
    public function testRIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function RIR_Provider()
    {
        return [
            
            [
                'couvre',
                'couvrir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'couvres',
                'couvrir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'couvre',
                'couvrir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular for ending_ir_without_iss
                'couvrons',
                'couvrir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'couvre',
                'couvrir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider COURIR_Provider
     */
    public function testCOURIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function COURIR_Provider()
    {
        return [
            
            [
                'cours',
                'courir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'cours',
                'courir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'court',
                'courir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'courons',
                'courir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'courez',
                'courir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'courent',
                'courir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'courus',
                'courir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'courus',
                'courir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'courut',
                'courir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'courûmes',
                'courir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'courûtes',
                'courir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'coururent',
                'courir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'courrai',
                'courir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'courras',
                'courir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'courra',
                'courir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'courrons',
                'courir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'courrez',
                'courir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'courront',
                'courir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'courusse',
                'courir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'courusses',
                'courir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'courût',
                'courir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'courussions',
                'courir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'courussiez',
                'courir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'courussent',
                'courir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'courrais',
                'courir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'courrais',
                'courir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'courrait',
                'courir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'courrions',
                'courir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'courriez',
                'courir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'courraient',
                'courir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'cours',
                'courir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider MOURIR_Provider
     */
    public function testMOURIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function MOURIR_Provider()
    {
        return [
            
            [
                'meurs',
                'mourir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'meurs',
                'mourir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'meurt',
                'mourir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'mourons',
                'mourir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'mourez',
                'mourir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'meurent',
                'mourir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'mourus',
                'mourir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'mourus',
                'mourir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'mourut',
                'mourir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'mourûmes',
                'mourir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'mourûtes',
                'mourir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'moururent',
                'mourir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'mourrai',
                'mourir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'mourras',
                'mourir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'mourra',
                'mourir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'mourrons',
                'mourir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'mourrez',
                'mourir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'mourront',
                'mourir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'meure',
                'mourir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'meures',
                'mourir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'meure',
                'mourir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'mourions',
                'mourir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'mouriez',
                'mourir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'meurent',
                'mourir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'mourusse',
                'mourir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'mourusses',
                'mourir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'mourût',
                'mourir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'mourussions',
                'mourir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'mourussiez',
                'mourir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'mourussent',
                'mourir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'mourrais',
                'mourir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'mourrais',
                'mourir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'mourrait',
                'mourir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'mourrions',
                'mourir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'mourriez',
                'mourir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'mourraient',
                'mourir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            [
                'meurs',
                'mourir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider QUERIR_Provider
     */
    public function testQUERIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function QUERIR_Provider()
    {
        return [
            [
                'acquiers',
                'acquérir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'acquiers',
                'acquérir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'acquiert',
                'acquérir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'acquérons',
                'acquérir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'acquérez',
                'acquérir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'acquièrent',
                'acquérir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'acquerrai',
                'acquérir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'acquerras',
                'acquérir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'acquerra',
                'acquérir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'acquerrons',
                'acquérir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'acquerrez',
                'acquérir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'acquerront',
                'acquérir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'acquière',
                'acquérir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'acquières',
                'acquérir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'acquière',
                'acquérir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'acquérions',
                'acquérir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'acquériez',
                'acquérir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'acquièrent',
                'acquérir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'acquisse',
                'acquérir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'acquisses',
                'acquérir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'acquît',
                'acquérir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'acquissions',
                'acquérir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'acquissiez',
                'acquérir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'acquissent',
                'acquérir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            [
                'acquerrais',
                'acquérir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'acquerrais',
                'acquérir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'acquerrait',
                'acquérir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'acquerrions',
                'acquérir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'acquerriez',
                'acquérir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'acquerraient',
                'acquérir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'acquiers',
                'acquérir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider CUEILLIR_Provider
     */
    public function testCUEILLIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function CUEILLIR_Provider()
    {
        return [
            
            [
                'cueille',
                'cueillir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'cueilles',
                'cueillir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'cueille',
                'cueillir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'cueillons',
                'cueillir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'cueillez',
                'cueillir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'cueillent',
                'cueillir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'cueillerai',
                'cueillir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'cueilleras',
                'cueillir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'cueillera',
                'cueillir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'cueillerons',
                'cueillir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'cueillerez',
                'cueillir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'cueilleront',
                'cueillir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'cueillisse',
                'cueillir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'cueillisses',
                'cueillir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'cueillît',
                'cueillir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'cueillissions',
                'cueillir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular
                'cueillissiez',
                'cueillir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'cueillissent',
                'cueillir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'cueillerais',
                'cueillir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'cueillerais',
                'cueillir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'cueillerait',
                'cueillir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'cueillerions',
                'cueillir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'cueilleriez',
                'cueillir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'cueilleraient',
                'cueillir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'cueille',
                'cueillir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider BOUILLIR_Provider
     */
    public function testBOUILLIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function BOUILLIR_Provider()
    {
        return [
            
            [
                'bous',
                'bouillir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'bous',
                'bouillir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'bout',
                'bouillir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular for ending_ir_without_iss
                'bouillons',
                'bouillir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            
            [
                'bouillisse',
                'bouillir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'bouillisses',
                'bouillir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'bouillît',
                'bouillir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'bouillissions',
                'bouillir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'bouillissiez',
                'bouillir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'bouillissent',
                'bouillir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'bous',
                'bouillir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider SAILLIR_Provider
     */
    public function testSAILLIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function SAILLIR_Provider()
    {
        return [
            [
                'saille',
                'saillir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'sailles',
                'saillir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'saille',
                'saillir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular for ending_ir_without_iss/ other form with_iss, if all other forms regular -ir ...
                'saillons',
                'saillir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            
            [
                'saillerai',
                'saillir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'sailleras',
                'saillir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'saillera',
                'saillir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'saillerons',
                'saillir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'saillerez',
                'saillir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'sailleront',
                'saillir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'saillisse',
                'saillir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'saillisses',
                'saillir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'saillît',
                'saillir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'saillissions',
                'saillir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'saillissiez',
                'saillir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'saillissent',
                'saillir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'saillerais',
                'saillir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'saillerais',
                'saillir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'saillerait',
                'saillir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'saillerions',
                'saillir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'sailleriez',
                'saillir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'sailleraient',
                'saillir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'saille',
                'saillir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider DORMIR_Provider
     */
    public function testDORMIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function DORMIR_Provider()
    {
        return [
            
            [
                'dors',
                'dormir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'dors',
                'dormir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'dort',
                'dormir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular for ending_ir_without_iss
                'dormons',
                'dormir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'dors',
                'dormir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider TIR_Provider
     */
    public function testTIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function TIR_Provider()
    {
        return [
            
            [
                'assens',
                'assentir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'assens',
                'assentir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'assent',
                'assentir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular for ending_ir_without_iss
                'assentons',
                'assentir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'assens',
                'assentir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider SERVIR_Provider
     */
    public function testSERVIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function SERVIR_Provider()
    {
        return [
            
            [
                'sers',
                'servir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'sers',
                'servir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'sert',
                'servir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular for ending_ir_without_iss
                'servons',
                'servir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'sers',
                'servir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Savoir_Provider
     */
    public function testSavoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Savoir_Provider()
    {
        return [
            [
                'sais',
                'savoir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'sais',
                'savoir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'sait',
                'savoir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savons',
                'savoir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savez',
                'savoir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'savent',
                'savoir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savais',
                'savoir',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savais',
                'savoir',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savait',
                'savoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savions',
                'savoir',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'saviez',
                'savoir',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // with word_stem_ending_oir
                'savaient',
                'savoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'sus',
                'savoir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'sus',
                'savoir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'sut',
                'savoir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'sûmes',
                'savoir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'sûtes',
                'savoir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'surent',
                'savoir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [ // word_stem sau + changed oir ending
                'saurai',
                'savoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // word_stem sau + changed oir ending
                'sauras',
                'savoir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // word_stem sau + changed oir ending
                'saura',
                'savoir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [ // word_stem sau + changed oir ending
                'saurons',
                'savoir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // word_stem sau + changed oir ending
                'saurez',
                'savoir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // word_stem sau + changed oir ending
                'sauront',
                'savoir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'sache',
                'savoir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'saches',
                'savoir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'sache',
                'savoir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'sachions',
                'savoir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'sachiez',
                'savoir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'sachent',
                'savoir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // with word_stem_ending_mouvoir + changed oir ending
                'susse',
                'savoir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'susses',
                'savoir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'sût',
                'savoir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'sussions',
                'savoir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'sussiez',
                'savoir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [ // with word_stem_ending_mouvoir + changed oir ending
                'sussent',
                'savoir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // word_stem sau + changed oir ending
                'saurais',
                'savoir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [ // word_stem sau + changed oir ending
                'saurais',
                'savoir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [ // word_stem sau + changed oir ending
                'saurait',
                'savoir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [ // word_stem sau + changed oir ending
                'saurions',
                'savoir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [ // word_stem sau + changed oir ending
                'sauriez',
                'savoir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [ // word_stem sau + changed oir ending
                'sauraient',
                'savoir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'sache',
                'savoir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'sachons',
                'savoir',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'sachez',
                'savoir',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider Vetir_Provider
     */
    public function testVetir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function Vetir_Provider()
    {
        return [
            [
                'vêts',
                'vêtir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'vêts',
                'vêtir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'vêt',
                'vêtir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'vêts',
                'vêtir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider ENIR_Provider
     */
    public function testENIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function ENIR_Provider()
    {
        return [
            
            [ // regular ending for without_ir
                'tiens',
                'tenir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // regular ending for without_ir
                'tiens',
                'tenir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // regular ending for without_ir
                'tient',
                'tenir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'tenons',
                'tenir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular
                'tenez',
                'tenir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'tiennent',
                'tenir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'tins',
                'tenir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'tins',
                'tenir',
                'Passe',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'tint',
                'tenir',
                'Passe',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'tînmes',
                'tenir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'tîntes',
                'tenir',
                'Passe',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'tinrent',
                'tenir',
                'Passe',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'tiendrai',
                'tenir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'tiendras',
                'tenir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'tiendra',
                'tenir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'tiendrons',
                'tenir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'tiendrez',
                'tenir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'tiendront',
                'tenir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'tienne',
                'tenir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'tiennes',
                'tenir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'tienne',
                'tenir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'tenions',
                'tenir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'teniez',
                'tenir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'tiennent',
                'tenir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'tinsse',
                'tenir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'tinsses',
                'tenir',
                'Imparfait',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'tînt',
                'tenir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'tinssions',
                'tenir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'tinssiez',
                'tenir',
                'Imparfait',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'tinssent',
                'tenir',
                'Imparfait',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [
                'tiendrais',
                'tenir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'tiendrais',
                'tenir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'tiendrait',
                'tenir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'tiendrions',
                'tenir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'tiendriez',
                'tenir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'tiendraient',
                'tenir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [ // regular ending for without_ir
                'tiens',
                'tenir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider VALOIR_Provider
     */
    public function testVALOIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function VALOIR_Provider()
    {
        return [
            
            [
                'vaux',
                'valoir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'vaux',
                'valoir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'vaut',
                'valoir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [ // regular wordstem -oir
                'valons',
                'valoir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [ // regular wordstem -oir
                'valez',
                'valoir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [ // regular wordstem -oir
                'valent',
                'valoir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'vaudrai',
                'valoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'vaudras',
                'valoir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'vaudra',
                'valoir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'vaudrons',
                'valoir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'vaudrez',
                'valoir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'vaudront',
                'valoir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'vaille',
                'valoir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'vailles',
                'valoir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'vaille',
                'valoir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // regular wordstem -oir
                'valions',
                'valoir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [ // regular wordstem -oir
                'valiez',
                'valoir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'vaillent',
                'valoir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            [ // test
                'valus',
                'valoir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // test
                'valusse',
                'valoir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            
            [
                'vaudrais',
                'valoir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'vaudrais',
                'valoir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'vaudrait',
                'valoir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'vaudrions',
                'valoir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'vaudriez',
                'valoir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'vaudraient',
                'valoir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'vaux',
                'valoir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider FUIR_Provider
     */
    public function testFUIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function FUIR_Provider()
    {
        return [
            
            [ // regular
                'fuis',
                'fuir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'fuis',
                'fuir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [ // regular
                'fuit',
                'fuir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'fuyons',
                'fuir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'fuyez',
                'fuir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'fuient',
                'fuir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'fuyais',
                'fuir',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'fuyais',
                'fuir',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'fuyait',
                'fuir',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'fuyions',
                'fuir',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'fuyiez',
                'fuir',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'fuyaient',
                'fuir',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [ // => regular test case
                'fuîmes',
                'fuir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            
            [ // => regular test case
                'fuirai',
                'fuir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [ // regular
                'fuie',
                'fuir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'fuies',
                'fuir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [ // regular
                'fuie',
                'fuir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'fuyions',
                'fuir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'fuyiez',
                'fuir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'fuient',
                'fuir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            [ // => regular test case
                'fuît',
                'fuir',
                'Imparfait',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [ // => regular test case
                'fuissions',
                'fuir',
                'Imparfait',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            
            [ // => regular test case
                'fuirions',
                'fuir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            
            [
                'fuis',
                'fuir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'fuyons',
                'fuir',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'fuyez',
                'fuir',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ]
        ];
    }

    /**
     * @dataProvider VOIR_Provider
     */
    public function testVOIR_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, conjugate(new InfinitiveVerb($infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function VOIR_Provider()
    {
        return [
            
            [
                'vois',
                'voir',
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'vois',
                'voir',
                'Present',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'voit',
                'voir',
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'voyons',
                'voir',
                'Present',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'voyez',
                'voir',
                'Present',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'voient',
                'voir',
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [ // exception of voir-group
                'pourvus',
                'pourvoir',
                'Passe',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [ // test
                'vîmes',
                'voir',
                'Passe',
                'FirstPersonPlural',
                'Indicatif'
            ],
            
            [
                'voyais',
                'voir',
                'Imparfait',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'voyais',
                'voir',
                'Imparfait',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'voyait',
                'voir',
                'Imparfait',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            
            [
                'voyions',
                'voir',
                'Imparfait',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'voyiez',
                'voir',
                'Imparfait',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'voyaient',
                'voir',
                'Imparfait',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [ // exception of voir-group
                'prévoirai',
                'prévoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [ // exception of voir-group
                'pourvoirai',
                'pourvoir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            
            [
                'verrai',
                'voir',
                'Futur',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'verras',
                'voir',
                'Futur',
                'SecondPersonSingular',
                'Indicatif'
            ],
            [
                'verra',
                'voir',
                'Futur',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'verrons',
                'voir',
                'Futur',
                'FirstPersonPlural',
                'Indicatif'
            ],
            [
                'verrez',
                'voir',
                'Futur',
                'SecondPersonPlural',
                'Indicatif'
            ],
            [
                'verront',
                'voir',
                'Futur',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            
            [
                'voie',
                'voir',
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'voies',
                'voir',
                'Present',
                'SecondPersonSingular',
                'Subjonctif'
            ],
            [
                'voie',
                'voir',
                'Present',
                'ThirdPersonSingular',
                'Subjonctif'
            ],
            [
                'voyions',
                'voir',
                'Present',
                'FirstPersonPlural',
                'Subjonctif'
            ],
            [
                'voyiez',
                'voir',
                'Present',
                'SecondPersonPlural',
                'Subjonctif'
            ],
            [
                'voient',
                'voir',
                'Present',
                'ThirdPersonPlural',
                'Subjonctif'
            ],
            
            [ // test
                'visse',
                'voir',
                'Imparfait',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            
            [
                'verrais',
                'voir',
                'Present',
                'FirstPersonSingular',
                'Conditionnel'
            ],
            [
                'verrais',
                'voir',
                'Present',
                'SecondPersonSingular',
                'Conditionnel'
            ],
            [
                'verrait',
                'voir',
                'Present',
                'ThirdPersonSingular',
                'Conditionnel'
            ],
            [
                'verrions',
                'voir',
                'Present',
                'FirstPersonPlural',
                'Conditionnel'
            ],
            [
                'verriez',
                'voir',
                'Present',
                'SecondPersonPlural',
                'Conditionnel'
            ],
            [
                'verraient',
                'voir',
                'Present',
                'ThirdPersonPlural',
                'Conditionnel'
            ],
            
            [
                'vois',
                'voir',
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'voyons',
                'voir',
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'voyez',
                'voir',
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ]
        ];
    }
}
?>