<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Menu;

use Knp\Menu\FactoryInterface;

class MenuBuilder
{

    private $factory;

    private $navClass = 'nav justify-content-end';

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    //    public function createMainMenu()
    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root', [
          'childrenAttributes' => [
            'class' => 'navbar-nav me-auto mb-2 mb-lg-0',
          ],
        ]);

        $menu->addChild('Goals', ['route' => 'app_goal_index']);
        $menu->addChild('Workday Template', ['route' => 'app_workday_template']);
        $menu->addChild('WorkWeek Template', ['route' => 'app_workweek_template']);
        $menu->addChild('Activity', ['route' => 'app_activity_index']);
        $menu->addChild('Workday Template admin', ['route' => 'app_workday_template_index']);

        return $menu;
    }

    public function createFooterMenu()
    {
        $menu = $this->factory->createItem('root', [
          'childrenAttributes' => [
            'class' => 'navbar-nav me-auto mb-2 mb-lg-0',
          ],
        ]);

        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('Goals', ['route' => 'app_goal_index']);

        return $menu;
    }

}