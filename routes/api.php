<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api; // Import the Api namespace
use App\Http\Controllers\Api\ContactSubmissionController;
use App\Http\Controllers\Api\EducationItemController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\NavigationLinkController;
use App\Http\Controllers\Api\PersonalInfoController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SocialLinkController;
use App\Http\Controllers\Api\TechCategoryController;
use App\Http\Controllers\Api\TechItemController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\PortfolioItemController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\SeoDetailController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ShareSnippetController;
use App\Http\Controllers\Api\TagController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// // Publicly accessible portfolio data
// Route::middleware([
//     EnsureFrontendRequestsAreStateful::class,
//     'auth:sanctum'
// ])->group(function () {
//     Route::prefix('blog')->group(function () {
//     Route::apiResource('categories', CategoryController::class);
//     Route::apiResource('posts', PostController::class);
//     Route::apiResource('comments', CommentController::class);
//     Route::apiResource('newsletters', NewsletterController::class);
//     Route::apiResource('seo-details', SeoDetailController::class);
//     Route::apiResource('settings', SettingController::class);
//     Route::apiResource('share-snippets', ShareSnippetController::class);
//     Route::apiResource('tags', TagController::class);
    
// });
// Route::prefix('portfolio')->group(function () {
// Route::get('/personal-info', [Api\PersonalInfoController::class, 'index'])->name('api.personal-info.index');

// Route::get('/navigation-links', [Api\NavigationLinkController::class, 'index'])->name('api.navigation-links.index');
// Route::get('/social-links', [Api\SocialLinkController::class, 'index'])->name('api.social-links.index');

// Route::get('/tech-categories', [Api\TechCategoryController::class, 'index'])->name('api.tech-categories.index');
// Route::get('/tech-items', [Api\TechItemController::class, 'index'])->name('api.tech-items.index'); // All tech items

// Route::get('/experiences', [Api\ExperienceController::class, 'index'])->name('api.experiences.index');
// Route::get('/projects', [Api\ProjectController::class, 'index'])->name('api.projects.index'); // Supports ?featured=true
// Route::get('/education-items', [Api\EducationItemController::class, 'index'])->name('api.education-items.index');

// // Contact form submission
// Route::post('/contact-submissions', [Api\ContactSubmissionController::class, 'store'])->name('api.contact-submissions.store');

// // Example of fetching a single item (less common for portfolio frontends but good to know)
//  Route::get('/projects/{project}', [Api\ProjectController::class, 'show'])->name('api.projects.show');
// // Route::get('/experiences/{experience}', [Api\ExperienceController::class, 'show'])->name('api.experiences.show');
// });
// });

// --- PUBLIC BLOG ROUTES ---
Route::prefix('blog')->group(function () {
    Route::apiResource('categories', Api\CategoryController::class)->only(['index', 'show'])->names([
        'index' => 'api.categories.index',
        'show' => 'api.categories.show',
    ]);
    Route::apiResource('posts', Api\PostController::class)->only(['index', 'show'])->names([
        'index' => 'api.posts.index',
        'show' => 'api.posts.show',
    ]);
    Route::apiResource('comments', Api\CommentController::class)->only(['index', 'show'])->names([
        'index' => 'api.comments.index',
        'show' => 'api.comments.show',
    ]);
    Route::apiResource('newsletters', Api\NewsletterController::class)->only(['index', 'show'])->names([
        'index' => 'api.newsletters.index',
        'show' => 'api.newsletters.show',
    ]);
    Route::apiResource('seo-details', Api\SeoDetailController::class)->only(['index', 'show'])->names([
        'index' => 'api.seo-details.index',
        'show' => 'api.seo-details.show',
    ]);
    Route::apiResource('settings', Api\SettingController::class)->only(['index', 'show'])->names([
        'index' => 'api.settings.index',
        'show' => 'api.settings.show',
    ]);
    Route::apiResource('share-snippets', Api\ShareSnippetController::class)->only(['index', 'show'])->names([
        'index' => 'api.share-snippets.index',
        'show' => 'api.share-snippets.show',
    ]);
    Route::apiResource('tags', Api\TagController::class)->only(['index', 'show'])->names([
        'index' => 'api.tags.index',
        'show' => 'api.tags.show',
    ]);
});

// --- PUBLIC PORTFOLIO ROUTES ---
Route::prefix('portfolio')->group(function () {
    Route::get('/personal-info', [Api\PersonalInfoController::class, 'index'])->name('api.personal-info.index');
    Route::get('/navigation-links', [Api\NavigationLinkController::class, 'index'])->name('api.navigation-links.index');
    Route::get('/social-links', [Api\SocialLinkController::class, 'index'])->name('api.social-links.index');
    Route::get('/tech-categories', [Api\TechCategoryController::class, 'index'])->name('api.tech-categories.index');
    Route::get('/education-items', [Api\EducationItemController::class, 'index'])->name('api.education-items.index');
    Route::get('/tech-items', [Api\TechItemController::class, 'index'])->name('api.tech-items.index');
    Route::get('/experiences', [Api\ExperienceController::class, 'index'])->name('api.experiences.index');
    Route::get('/projects', [Api\ProjectController::class, 'index'])->name('api.projects.index');
    Route::get('/education-items', [Api\EducationItemController::class, 'index'])->name('api.education-items.index');
    Route::get('/projects/{project}', [Api\ProjectController::class, 'show'])->name('api.projects.show');
    // Add testimonials and patron tiers if needed:
     Route::get('/testimonials', [Api\TestimonialController::class, 'index']);
     Route::get('/patron-tiers', [Api\PatronTierController::class, 'index']);
});
