 // Increment the view count
 // $recipeInc = $recipe->increment('view_count');


 // // only 1 increment check user
 // if(Auth::check()){
 // Auth::user()->name;
 // }
 // $authID = Auth::user()->id;

 // return $recipeInc;

 // # check user
 // Recipe::where('user_id', $recipe->user_id)->first();


 $userID = Auth::user()->id;
 // $recipe->increment('view_count');
 // $recipe->update(['user_id' => $userID]);

 // Fetch total views for the user's recipes

 $totalViews = Recipe::where('user_id', $recipe->user_id)->sum('view_count');


 //check user already recipe view
 $recipeView = RecipeView::where('user_id', $userID)
 ->where('recipe_id', $recipe->id)
 ->first();

 // if (!RecipeView::where('recipe_id',$recipe->id)->where('user_id', $userID)->exists()) {

 // RecipeView::create([
 // 'user_id' => $userID,
 // 'recipe_id' => $recipe->id,
 // ]);

 // $recipe->increment('view_count');
 // }

 // if (!$recentlyViewedProducts) {
 // // Add to recently viewed products
 // RecentlyViewedRecipe::create([
 // 'user_id' => $userId,
 // 'recipe_id' => $recipe->id,
 // ]);

 // $recipe->increment('view_count');


 if (!empty($recipeView)) {
 $recipeView->delete();
 $recipe->decrement('view_count');
 }



 // }


 // or

 // if(!RecipeView::where('recipe_id', $recipe->id)->where('user_id', $userID)->exists()) {

 // RecipeView::create([
 // 'recipe_id' => $recipe->id,
 // 'user_id' => $userID,
 // ]);

 // $recipe->increment('views');
 // }

 //

 //expire on date
 $expiresAt = Carbon::now()->addDay(); // Set expiry 1 day from now

 if (!$recipeView) {

 // Add to Recipe watch
 RecipeView::create([
 'user_id' => $userID,
 'recipe_id' => $recipe->id,
 'expires_at' => $expiresAt
 ]);

 // recipe view count added
 $recipe->increment('view_count');
 }
 // else{
 // return 'Sorry ALready Added on view';
 // }


 // =================



 // $recipe->view_count = $recipe->view_count + 1;

 // Recipe watch on store recipe
 $recipeWatch = RecipeView::where('recipe_id', $recipe->id)->first();


 //expire on date
 $expiresAt = Carbon::now()->addDay(); // Set expiry 1 day from now

 // $recipeWatch = RecipeView::where('recipe_id', $recipe->id)->where('user_id', $userID)->first();

 //check if user has watched the recipe

 // if user has watched the recipe
 // if ($recipeWatch) {
 // // delete the recipe watch
 // $recipeWatch->delete();

 // $recipe->view_count = $recipe->view_count - 1;
 // $recipe->save();

 // return response()->json([
 // 'status' => 'success',
 // 'message' => 'Recipe unwatched',
 // 'view_count' => $recipe->view_count,
 // 'total_views' => $totalViews,
 // ]);
 // } else {
 // // if user has not watched the recipe added
 // $recipeWatch = new RecipeView();
 // $recipeWatch->recipe_id = $recipe->id;
 // $recipeWatch->user_id = $userID;
 // $recipeWatch->user_id = $userID;
 // $recipeWatch->expires_at = $expiresAt;
 // $recipeWatch->save();

 // $recipe->view_count = $recipe->view_count + 1;
 // $recipe->save();

 // return response()->json([
 // 'status' => 'success',
 // 'message' => 'Recipe watched',
 // 'view_count' => $recipe->view_count,
 // 'total_views' => $totalViews,
 // ]);
 // }