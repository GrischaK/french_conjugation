<?php
class IrregularExceptionGroup {
	public static $eler_ele = ['peler'];
	public static $eter_ete = ['acheter'];	

	public static $eler_elle = ['appeler'];
	public static $eter_ette = ['jeter'];

	public static $envoyer = ['envoyer'];

	public static $cer = ['agacer'];
	public static $ger = ['manger'];

	public static $e_akut_er = ['accélérer','espérer','sécher','redégénérer'];
	public static $e_er = ['peser'];

	public static $enir = ['tenir'];
	public static $fuir = ['fuir'];
	public static $bouillir = ['bouillir'];
	public static $saillir = ['saillir'];
	public static $valoir = ['valoir'];
	public static $voir = ['voir','prévoir','pourvoir'];
	
	public static $devoir = ['devoir','redevoir'];
	public static $mouvoir = ['autopromouvoir','mouvoir'];
	public static $pouvoir = ['pouvoir'];
	public static $savoir = ['resavoir','savoir'];

	public static $rir = ['couvrir'];
	public static $courir = ['courir'];
	public static $mourir = ['remourir','mourir'];
	public static $querir = ['acquérir'];
	
	public static $dormir = ['dormir'];
	public static $tir = ['assentir'];
	public static $servir = ['servir'];
	public static $cueillir = ['cueillir'];
	
	public static $vetir = ['vêtir'];
	
	public static $ohne_iss;
  static function init()
  {
    self::$ohne_iss = array_merge(
    		self::$enir,
    		self::$fuir,
    		self::$bouillir,
    		self::$saillir,
    		self::$valoir,
    		self::$voir,
    		self::$dormir,
    		self::$tir,
    		self::$servir,
    		self::$cueillir,
    		self::$rir,
    		self::$servir,
    		self::$courir,
    		self::$mourir,
    		self::$querir,
    		self::$vetir,
    		self::$devoir,
    		self::$mouvoir,
    		self::$pouvoir,
    		self::$savoir,
    		self::$vetir);
  }
}
IrregularExceptionGroup::init();
?> 