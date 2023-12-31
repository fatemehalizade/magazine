<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MagazineProfileController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ViewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Writer\WriterDashboardController;
use App\Http\Controllers\Writer\WriterPostController;
use App\Http\Controllers\Writer\WriterProfileController;
use App\Http\Controllers\Writer\WriterTicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/******************* Panel ADMIN *************/


Route::middleware("admin")->group(function () {
    /******************* Dashboard *************/
    Route::get("/admin/dashboard",[AdminDashboardController::class,"Index"])->name("adminDashboardPage");
    /******************* Profile Website *************/
    Route::get("/magazine/profile",[MagazineProfileController::class,"Index"])->name("magazineProfilePage");
    Route::post("/magazine/profile",[MagazineProfileController::class,"Update"])->name("updateMagazineProfile");
    /***************** Tags ***************/
    Route::get("/tags",[TagController::class,"Index"])->name("allTags");
    Route::get("/tags/edit/{id}",[TagController::class,"EditPage"])->name("editTagPage");
    Route::post("/tags/edit/{id}",[TagController::class,"Update"])->name("updateTag");
    Route::get("/tags/create",[TagController::class,"CreatePage"])->name("createTagPage");
    Route::post("/tags/create",[TagController::class,"Create"])->name("createTag");
    Route::get("/tags/delete/{id}",[TagController::class,"Delete"])->name("deleteTag");
    /***************** Message ************/
    Route::get("/messages",[MessageController::class,"Index"])->name("allMessages");
    /***************** Social Media ***************/
    Route::get("/socialmedias",[SocialMediaController::class,"Index"])->name("allSocialMedias");
    Route::get("/socialmedias/edit/{id}",[SocialMediaController::class,"EditPage"])->name("editSocialMediaPage");
    Route::post("/socialmedias/edit/{id}",[SocialMediaController::class,"Update"])->name("updateSocialMedia");
    Route::get("/socialmedias/create",[SocialMediaController::class,"CreatePage"])->name("createSocialMediaPage");
    Route::post("/socialmedias/create",[SocialMediaController::class,"Create"])->name("createSocialMedia");
    Route::get("/socialmedias/delete/{id}",[SocialMediaController::class,"Delete"])->name("deleteSocialMedia");
    /******************* Profile Admin *************/
    Route::get("/admin/profile",[AdminProfileaController::class,"Index"])->name("adminProfilePage");
    Route::post("/admin/profile",[AdminProfileaController::class,"Update"])->name("updateAdminProfile");
    /***************** Category ***************/
    Route::get("/categories",[CategoryController::class,"Index"])->name("allCategories");
    Route::get("/categories/edit/{id}",[CategoryController::class,"EditPage"])->name("editCategoryPage");
    Route::post("/categories/edit/{id}",[CategoryController::class,"Update"])->name("updateCategory");
    Route::get("/categories/create",[CategoryController::class,"CreatePage"])->name("createCategoryPage");
    Route::post("/categories/create",[CategoryController::class,"Create"])->name("createCategory");
    Route::get("/categories/delete/{id}",[CategoryController::class,"Delete"])->name("deleteCategory");
    /***************** User ***************/
    Route::get("/users",[UserController::class,"Index"])->name("allUsers");
    Route::get("/users/edit/{id}",[UserController::class,"EditPage"])->name("editUserPage");
    Route::post("/users/edit/{id}",[UserController::class,"Update"])->name("updateUser");
    Route::get("/users/create",[UserController::class,"CreatePage"])->name("createUserPage");
    Route::post("/users/create",[UserController::class,"Create"])->name("createUser");
    Route::get("/users/delete/{id}",[UserController::class,"Delete"])->name("deleteUser");
    /***************** Comment ***************/
    Route::get("/comments",[CommentController::class,"Index"])->name("allComments");
    Route::get("/comments/determinestatus/{id}/{status}",[CommentController::class,"DetermineStatus"])->name("commentDetermineStatus");
    /***************** Post ***************/
    Route::get("/posts",[PostController::class,"Index"])->name("allPosts");
    Route::get("/posts/edit/{id}",[PostController::class,"EditPage"])->name("editPostPage");
    Route::post("/posts/edit/{id}",[PostController::class,"Update"])->name("updatePost");
    Route::get("/posts/create",[PostController::class,"CreatePage"])->name("createPostPage");
    Route::post("/posts/create",[PostController::class,"Create"])->name("createPost");
    Route::get("/posts/delete/{id}",[PostController::class,"Delete"])->name("deletePost");
    Route::get("/posts/determinestatus/{id}/{status}",[PostController::class,"DetermineStatus"])->name("postDetermineStatus");
    /***************** Ticket ***************/
    Route::get("/tickets",[TicketController::class,"Index"])->name("ticketPage");
    Route::get("/tickets/{id}",[TicketController::class,"Detail"])->name("detailTicketPage");
    Route::post("/tickets/create/{id}",[TicketController::class,"Create"])->name("createNewTicket");
    /***************** View ***************/
    Route::get("/views",[ViewController::class,"Index"])->name("viewPage");
});


/******************* Panel WRITER *************/


Route::middleware("writer")->group(function () {
    /******************* Dashboard *************/
    Route::get("/writer/dashboard",[WriterDashboardController::class,"Index"])->name("writerDashboardPage");
    /******************* Profile Writer *************/
    Route::get("/writer/profile",[WriterProfileController::class,"Index"])->name("writerProfilePage");
    Route::post("/writer/profile",[WriterProfileController::class,"Update"])->name("updateWriterProfile");
    /***************** Post ***************/
    Route::get("/writer/posts",[WriterPostController::class,"Index"])->name("allWriterPosts");
    Route::get("/writer/posts/edit/{id}",[WriterPostController::class,"EditPage"])->name("editWriterPostPage");
    Route::post("/writer/posts/edit/{id}",[WriterPostController::class,"Update"])->name("updateWriterPost");
    Route::get("/writer/posts/create",[WriterPostController::class,"CreatePage"])->name("createWriterPostPage");
    Route::post("/writer/posts/create",[WriterPostController::class,"Create"])->name("createWriterPost");
    /***************** Ticket ***************/
    Route::get("/writer/tickets",[WriterTicketController::class,"Index"])->name("WriterTicketPage");
    Route::post("/writer/tickets/create",[WriterTicketController::class,"Create"])->name("createWriterTicket");
});


/******************* Public pages Routes *************/

    /***************** Register ***************/
    Route::post("/register",[RegisterController::class,"Register"])->name("register");
    /***************** Login ***************/
    Route::post("/login",[LoginController::class,"Login"])->name("login");
    /***************** home Section ***************/
    Route::get("/",[IndexController::class,"Index"])->name("homePage");
    /***************** Contact Section ***************/
    Route::get("/contact",[ContactController::class,"Index"])->name("contactPage");
    Route::post("/contact",[ContactController::class,"Create"])->name("contactMessage");
    /***************** About Section ***************/
    Route::get("/about",[AboutController::class,"Index"])->name("aboutPage");
    /***************** Magazines Section ***************/
    Route::get("/magazines",[MagazineController::class,"LatestPosts"])->name("MagazinesPage");
    /***************** Post Detail Section ***************/
    Route::get("/detail/{id}",[MagazineController::class,"Detail"])->name("postDetailPage");
    /***************** Post Category Section ***************/
    Route::get("/category/{name}",[MagazineController::class,"CategoryPosts"])->name("categoryPostsPage");
    /***************** Latest Posts Section ***************/
    Route::get("/latest/posts",[MagazineController::class,"LatestPosts"])->name("latestPostsPage");
    /***************** Suggested Posts Section ***************/
    Route::get("/suggested/posts",[MagazineController::class,"SuggestedPosts"])->name("suggestedPostsPage");
    /***************** Most Visited Posts Section ***************/
    Route::get("/mostVisited/posts",[MagazineController::class,"MostVisitedPosts"])->name("mostVisitedPostsPage");
    /***************** Create Comment Section ***************/
    Route::post("/comments/create/{status}",[MagazineController::class,"CreateComment"])->name("createComment");
    /***************** Search Section ***************/
    Route::post("/search",[MagazineController::class,"SearchPosts"])->name("searchPosts");

/********************************************/
