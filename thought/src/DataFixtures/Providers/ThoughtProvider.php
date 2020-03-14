<?php

namespace App\DataFixtures\Providers;

use Faker\Provider\Base;

class ThoughtProvider extends Base
{


  protected static $thought = [
    'A Leshan, en Chine, un énorme Bouddha de 70m de haut, sculpté au Viieme siècle dans la falaise du mont Lingyun, veille au-dessus de 3 rivières. A l\'origine, un sytème de drainage intérieur fut conçut pour empêcher l\'érosion fluviale.',
    'Au creux des dunes du Sahara libyen, 2 lacs baignent l\'erg d\'Awbare : le lac Um El Ma et le lac de Mandara. Les oasis plantées de pamiers puissent leurs eaux dans les nappes souterraines du désert.',
    'Sur le lac Inle, au sud-est de la Birmanie, les Inthas utilisent leur panier conique en bambou pour pêcher, Après k\'avoir lancé au fond d lac, ils frappent l\'eau pour effrayer les poissons cachés dans les algues avant de remonter prestemetn leur nasse.',
    'Durant la saison des amours, le fou à pattes bleues d\'Amérique du Sud se dandine en exhibant ses pattes turquoise, déploie son plumage et siffle longuement en pointant son bec vers le ciel. Le mâle est toujours plus petit que la femelle',
  ];
  protected static $title = [
    'Le bouddha de Leshan',
    'le LAc Um El Ma',
    'Les Inthas',
    'Les fous à pattes bleues',
  ];



  public static function thoughtContent()
  {
    return static::randomElement(static::$thought);
  }
  public static function thoughtTitle()
  {
    return static::randomElement(static::$title);
  }

}
