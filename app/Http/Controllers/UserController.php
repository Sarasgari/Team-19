<!-- Eyad Alsaher 230047989 && Mohamed sharif 230228898 -->
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Display the users
    public function index()
    {
        $users = User::all();
        return view('admin.users')->with(['users'=> $users]);
    }

    // Show User Profile Page
    public function showProfile($user_id)
    {
        $user = User::find($user_id); // Get user
        $orders = Order::where('user_id', $user->id)->latest()->get();
        $cartItems = Cart::where('user_id', $user->id)->get();
        return view('admin.profile', compact('user', 'orders', 'cartItems'));
    }

    // Remove a user 
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json(['success' => 'User deleted successfully']);
}

    // edit user
    public function edit($id)
{
    $user = User::findOrFail($id);
    return response()->json($user); // Return user data as JSON
}

//update user
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all()); // Update user
    return response()->json(['success' => 'User updated successfully']);
}

}

