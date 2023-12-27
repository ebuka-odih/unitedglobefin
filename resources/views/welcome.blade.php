public function storeAccountSetup(Request $request)
{
$request->validate([
'identification_type' => 'required|string|max:255',
'id_expiry' => 'required|string|max:255',
'id_number' => 'required|string|max:255',
'id_front_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
'id_back_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

$id = $request->user_id;
$user = User::findOrFail($id);
// Upload and store the first image
if ($request->hasFile('id_front_img')) {
$image = $request->file('id_front_img');
$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
$destinationPath = public_path('/files');
$image->move($destinationPath, $input['imagename']);

$user->id_front_img = $input['imagename'];
$user->save();
}
// Upload and store the second image
if ($request->hasFile('id_back_img')) {
$image = $request->file('id_back_img');
$input2['imagename2'] = time().'.'.$image->getClientOriginalExtension();
$destinationPath = public_path('/files');
$image->move($destinationPath, $input2['imagename2']);

$user->id_back_img = $input2['imagename2'];
$user->save();
}
if ($request->hasFile('avatar')) {
$image = $request->file('avatar');
$input3['imagename3'] = time().'.'.$image->getClientOriginalExtension();
$destinationPath = public_path('/files');
$image->move($destinationPath, $input3['imagename3']);

$user->avatar = $input3['imagename3'];
$user->save();
}
$user->identification_type = $request->identification_type;
$user->id_number = $request->id_number;
$user->id_expiry = $request->id_expiry;
$user->save();

$this->autoCreate($user->id, $request['account_type'], $request['currency']);
return redirect()->route('terms', $user->id);
}
