<?php

declare(strict_types=1);

use App\Orchid\Screens\AboutCompany\AboutCompanyScreen;
use App\Orchid\Screens\Banks\BanksEditScreen;
use App\Orchid\Screens\Banks\BanksScreen;
use App\Orchid\Screens\Jk\JkEditScreen;
use App\Orchid\Screens\Mortgage\MortgageEditScreen;
use App\Orchid\Screens\Mortgage\MortgageScreen;
use App\Orchid\Screens\QuestionsCredit\QuestionsCreditEditScreen;
use App\Orchid\Screens\QuestionsCredit\QuestionsCreditScreen;
use App\Orchid\Screens\QuestionsMc\QuestionsMcEditScreen;
use App\Orchid\Screens\JkOptions\JkOptionsEditScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\JkOptions\JkOptionsScreen;
use App\Orchid\Screens\AboutCompany\AboutCompanyEditScreen;
use App\Orchid\Screens\House\HouseEditScreen;
use App\Orchid\Screens\House\HouseScreen;
use App\Orchid\Screens\Jk\JkScreen;
use App\Orchid\Screens\News\NewsEditScreen;
use App\Orchid\Screens\News\NewsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\QuestionsMc\QuestionsMcScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Sales\SalesEditScreen;
use App\Orchid\Screens\Sales\SalesScreen;
use App\Orchid\Screens\UkObjects\UkObjectsScreen;
use App\Orchid\Screens\UkObjects\UkObjectsEditScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

Route::screen('/news', NewsScreen::class)
    ->name('platform.news.list');

Route::screen('/news/create', NewsEditScreen::class)
    ->name('platform.news.create');

Route::screen('/news/{news}/edit', NewsEditScreen::class)
    ->name('platform.news.edit');

Route::screen('/sales', SalesScreen::class)
    ->name('platform.sales.list');

Route::screen('/sales/create', SalesEditScreen::class)
    ->name('platform.sales.create');

Route::screen('/sales/{sales}/edit', SalesEditScreen::class)
    ->name('platform.sales.edit');

Route::screen('/jk', JkScreen::class)
    ->name('platform.jk.list');

Route::screen('/jk/create', JkEditScreen::class)
    ->name('platform.jk.create');

Route::screen('/jk/{item}/edit', JkEditScreen::class)
    ->name('platform.jk.edit');

Route::screen('/jk/options', JkOptionsScreen::class)
    ->name('platform.jk.options.list');

Route::screen('/jk/options/create', JkOptionsEditScreen::class)
    ->name('platform.jk.options.create');

Route::screen('/jk/options/{item}/edit', JkOptionsEditScreen::class)
    ->name('platform.jk.options.edit');

Route::screen('/houses', HouseScreen::class)
    ->name('platform.house.list');

Route::screen('/houses/create', HouseEditScreen::class)
    ->name('platform.house.create');

Route::screen('/houses/{house}/edit', HouseEditScreen::class)
    ->name('platform.house.edit');

Route::screen('/about_company', AboutCompanyScreen::class)
    ->name('platform.about_company.list');

Route::screen('/about_company/create', AboutCompanyEditScreen::class)
    ->name('platform.about_company.create');

Route::screen('/about_company/{item}/edit', AboutCompanyEditScreen::class)
    ->name('platform.about_company.edit');

Route::screen('/questions_mc', QuestionsMcScreen::class)
    ->name('platform.questions_mc.list');

Route::screen('/questions/create', QuestionsMcEditScreen::class)
    ->name('platform.questions_mc.create');

Route::screen('/questions/{item}/edit', QuestionsMcEditScreen::class)
    ->name('platform.questions_mc.edit');

Route::screen('/questions_credit', QuestionsCreditScreen::class)
    ->name('platform.questions_credit.list');

Route::screen('/questions_credit/create', QuestionsCreditEditScreen::class)
    ->name('platform.questions_credit.create');

Route::screen('/questions_credit/{item}/edit', QuestionsCreditEditScreen::class)
    ->name('platform.questions_credit.edit');

Route::screen('/objects_uk', UkObjectsScreen::class)
    ->name('platform.objects_uk.list');

Route::screen('/objects_uk/create', UkObjectsEditScreen::class)
    ->name('platform.objects_uk.create');

Route::screen('/objects_uk/{item}/edit', UkObjectsEditScreen::class)
    ->name('platform.objects_uk.edit');

Route::screen('/mortgage', MortgageScreen::class)
    ->name('platform.mortgage.list');

Route::screen('/mortgage/create', MortgageEditScreen::class)
    ->name('platform.mortgage.create');

Route::screen('/mortgage/{item}/edit', MortgageEditScreen::class)
    ->name('platform.mortgage.edit');

Route::screen('/banks', BanksScreen::class)
    ->name('platform.banks.list');

Route::screen('/banks/create', BanksEditScreen::class)
    ->name('platform.banks.create');

Route::screen('/banks/{item}/edit', BanksEditScreen::class)
    ->name('platform.banks.edit');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile');

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit');

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create');

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users');

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

// Route::screen('idea', Idea::class, 'platform.screens.idea');
