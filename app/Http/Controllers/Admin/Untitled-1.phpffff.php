 if ($request->route('product')) {
 $productId = $request->route('product')->id;

 if (Auth::check()) {
 $userId = Auth::id();

 // Check if the product is already in the user's recently viewed list
 $existing = RecentlyViewedProduct::where('user_id', $userId)
 ->where('product_id', $productId)
 ->first();

 if (!$existing) {
 // Add to recently viewed products
 RecentlyViewedProduct::create([
 'user_id' => $userId,
 'product_id' => $productId,
 ]);

 // Limit to 5 recent products
 RecentlyViewedProduct::where('user_id', $userId)
 ->orderBy('created_at', 'asc')
 ->skip(5)
 ->take(PHP_INT_MAX)
 ->delete();
 }
 } else {
 // Fallback to session for guests
 $recentlyViewed = session()->get('recently_viewed', []);
 $recentlyViewed = array_filter($recentlyViewed, fn($id) => $id != $productId);
 array_unshift($recentlyViewed, $productId);
 $recentlyViewed = array_slice($recentlyViewed, 0, 5);
 session(['recently_viewed' => $recentlyViewed]);
 }
 }

 return $next($request);