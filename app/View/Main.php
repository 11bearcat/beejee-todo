<?php

namespace App\View;

class Main extends Base
{
    public function render($data = [])
    {
        ?>
            <!DOCTYPE html>
            <html class="no-focus" lang="en">
                <head>
                    <?php $this->header(); ?>
                </head>
                <body>
                    <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

                        <!-- Sidebar -->
                        <nav id="sidebar">
                            <!-- Sidebar Scroll Container -->
                            <div id="sidebar-scroll">
                                <!-- Sidebar Content -->
                                <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                                <div class="sidebar-content">
                                    <!-- Side Header -->
                                    <div class="side-header side-content bg-white-op">
                                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                        <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                                <i class="si si-drop"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                                <li>
                                                    <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                                        <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                                        <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                                        <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                                        <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                                        <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                                        <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="h5 text-white" href="index.html">
                                            <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">ne</span>
                                        </a>
                                    </div>
                                    <!-- END Side Header -->

                                    <!-- Side Content -->
                                    <div class="side-content side-content-full">
                                        <ul class="nav-main">
                                            <li>
                                                <a href="/admin/users"><i class="si si-users"></i><span class="sidebar-mini-hide">Администрация</span></a>
                                            </li>
                                            <li>
                                                <a href="/tasks"><i class="si si-rocket"></i><span class="sidebar-mini-hide">Задачи</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END Side Content -->
                                </div>
                                <!-- Sidebar Content -->
                            </div>
                            <!-- END Sidebar Scroll Container -->
                        </nav>
                        <!-- END Sidebar -->

                        <!-- Header -->
                        <header id="header-navbar" class="content-mini content-mini-full">
                            <!-- Header Navigation Right -->
                            <ul class="nav-header pull-right">
                                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                    
                                        <a tabindex="-1" href="<?= '/logout' ?>">
                                            <i class="si si-logout pull-right"></i>
                                        </a>
                                   
                                </li>
                            </ul>
                            <!-- END Header Navigation Right -->

                            <!-- Header Navigation Left -->
                            <ul class="nav-header pull-left">
                                <li class="hidden-md hidden-lg">
                                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                                        <i class="fa fa-navicon"></i>
                                    </button>
                                </li>
                                <li class="hidden-xs hidden-sm">
                                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                </li>
                                
                                <li class="visible-xs">
                                    <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                                    <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </li>
                                
                            </ul>
                            <!-- END Header Navigation Left -->
                        </header>
                        <!-- END Header -->

                        <!-- Main Container -->
                        <main id="main-container">

                            <!-- Page Content -->
                            <div class="content">
                                <?php $this->content($data); ?>
                            </div>
                            <!-- END Page Content -->
                        </main>
                        <!-- END Main Container -->

                        <!-- Footer -->
                        <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                            <div class="pull-right">
                                Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                            </div>
                            <div class="pull-left">
                                <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank">OneUI 3.4</a> &copy; <span class="js-year-copy">2015</span>
                            </div>
                        </footer>
                        <!-- END Footer -->
                    </div>
                    <?php $this->footer(); ?>
                </body>
            </html>
        <?php
    }

    public function content($data = [])
    {}

    public function table($data, $options, $buttons = [], $page = 1)
    {
        ?>
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Список элементов</h3>
                </div>
                <div class="block-content">
                    <?php
                        foreach ($buttons as $button) {
                            echo '<a class="btn btn-minw btn-rounded btn-success" href="' . $button['route'] . '">' . $button['label'] . '</a>';
                        }
                    ?>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <?php
                                        foreach ($options as $key => $column) {
                                            echo '<th id="' . $column['id'] . '" class="' . $column['class'] . '">' . $column['label'] . '</th>';
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data['data'] as $row) {
                                        echo '<tr>';
                                        foreach ($options as $key => $column) {
                                            if ($key == 'actions') {
                                                ?>
                                                    <td class="<?= $column['class'] ?>">
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <?php
                                                                foreach ($column['buttons'] as $button) {
                                                                    echo '<a class="btn btn-default" href="' . $button['route'] . '?id=' . $row['id'] . '"><i class="fa ' . $button['icon'] . '"></i></a>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                <?php
                                            } else {
                                                echo '<td class="' . $column['class'] .  '">' . (isset($column['transform']) ? $column['transform']($row) : $row[$key]) . '</td>';
                                            }

                                        }
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

             <ul class="pagination">
                <li>
                    <a onclick="pagePaginate(event, 1)">Начало</a>
                </li>
                <li class="<?php if ($data['page'] <= 1) { echo 'disabled'; } ?>">
                    <a onclick="pagePaginate(event, <?php if ($data['page'] <= 1){ echo '1'; } else { echo ($data['page'] - 1); } ?>, <?= ($data['page'] <= 1) ?>)">Предыдущая</a>
                </li>
                <li class="<?php if ($data['page'] >= $data['total_page']) { echo 'disabled'; } ?>">
                    <a onclick="pagePaginate(event, <?php if ($data['page'] >= $data['total_page']) { echo '1'; } else { echo ($data['page'] + 1); } ?>, <?= ($data['page'] >= $data['total_page']) ?>)">Следующая</a>
                </li>
                <li>
                    <a onclick="pagePaginate(event, <?php echo $data['total_page']; ?>)">Последняя</a>
                </li>
            </ul>
        <?php
    }
}