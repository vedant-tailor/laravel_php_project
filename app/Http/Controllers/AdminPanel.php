<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\productmodel;
use App\models\pincodemodel;
use App\models\productentry;
use App\Http\Controllers\AdminPanel;
class AdminPanel extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function product(){
        $viewproduct = productmodel::all();
        return view('admin.product',compact('viewproduct'));
   }

    public function addproduct(Request $request){
        $validated = $request->validate([
        'productname' => 'required|unique:productmodels|max:255',
    ]);
    
    $product = new productmodel;
    $product->productname = $request->productname;
    $product->save();
    return redirect('product')->with('success', 'Data inserted successfully.'); 
    return redirect('product');
    return view('admin.addproduct');
    }

    public function editproduct($id){
        $editproduct = productmodel::find($id);
        return view('admin.editproduct',compact('editproduct'));
    }

    public function updateproduct(Request $request,$id){
        $validated = $request->validate([
        'productname' => 'required|unique:productmodels,productname,'.$id.'|max:255',
    ]);
    $updateproduct =productmodel::find($id);
    $updateproduct->productname = $request->productname;
    $updateproduct->update();
    return redirect('product')->with('success', 'Data updated successfully.'); 
    }

    public function destroy($id){
        $deleteproduct = Productmodel::find($id);
        
        if ($deleteproduct) {
            $deleteproduct->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }

     public function pincode(){
        $viewpincode = pincodemodel::all();
        return view('admin.pincode',compact('viewpincode'));
   }

    public function addpincode(Request $request){
        $validated = $request->validate([
        'pincode' => 'required|unique:pincodemodels|max:255',
    ]);
    $pincode = new pincodemodel;
    $pincode->pincode = $request->pincode;
    $pincode->save();
    return redirect('pincode')->with('success', 'Data inserted successfully.'); 
    return redirect('pincode');
    return view('admin.addpincode');
    }

       public function editpincode($id){
        $editpincode = pincodemodel::find($id);
        return view('admin.editpincode',compact('editpincode'));
    }

    public function updatepincode(Request $request,$id){
        $validated = $request->validate([
        'pincode' => 'required|unique:pincodemodels,pincode,'.$id.'|max:255',
    ]);
    $updatepincode =pincodemodel::find($id);
    $updatepincode->pincode = $request->pincode;
    $updatepincode->update();
    return redirect('pincode')->with('success', 'Data updated successfully.'); 
    }

    public function pop($id){
        $deletepincode = pincodemodel::find($id);
        
        if ($deletepincode) {
            $deletepincode->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }

    public function productentry(){
        $viewproductentry = productmodel::all();
        $viewpentry = productentry::with('product')->get();
        return view('admin.productentry',compact('viewproductentry','viewpentry'));
    }

    public function addproductentry(Request $request){
        $validated = $request->validate([
        'product_entry' => 'required|unique:productentries,pnameid|max:255',
    ]);
    $productentry = new productentry;
    $productentry->category = $request->category;
    $productentry->pnameid = $request->product_entry;
    $productentry->company = $request->company;
    $productentry->color = $request->color;
    $productentry->material = $request->material;
    $productentry->size = $request->size;
    $productentry->description = $request->description;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = rand(11111,99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image_upload'), $filename);
        $productentry->image = $filename;
    }

    if ($request->hasFile('image1')) {
        $file1 = $request->file('image1');
        $filename1 = rand(11111,99999) . '.' . $file1->getClientOriginalExtension();
        $file1->move(public_path('image_upload'), $filename1);
        $productentry->image1 = $filename1;
    }

    if ($request->hasFile('image2')) {
        $file2 = $request->file('image2');
        $filename2 = rand(11111,99999) . '.' . $file2->getClientOriginalExtension();
        $file2->move(public_path('image_upload'), $filename2);
        $productentry->image2 = $filename2;
    }

    if ($request->hasFile('image3')) {
        $file3 = $request->file('image3');
        $filename3 = rand(11111,99999) . '.' . $file3->getClientOriginalExtension();
        $file3->move(public_path('image_upload'), $filename3);
        $productentry->image3 = $filename3;
    }

    if ($request->hasFile('image4')) {
        $file4 = $request->file('image4');
        $filename4 = rand(11111,99999) . '.' . $file4->getClientOriginalExtension();
        $file4->move(public_path('image_upload'), $filename4);
        $productentry->image4 = $filename4;
    }

    $productentry->price = $request->price;

    $productentry->save();
    return redirect('productentry')->with('success', 'Data inserted successfully.'); 
    }


    public function editproductentry($id){
        $viewproductentry = productmodel::all();
        $editproductentry = productentry::find($id);
        return view('admin.editproductentry',compact('editproductentry','viewproductentry'));
    }

    public function updateproductentry(Request $request,$id){
      
    $updateproductentry =productentry::find($id);
    $updateproductentry->category = $request->category;
    $updateproductentry->pnameid = $request->product_entry;
    $updateproductentry->company = $request->company;
    $updateproductentry->color = $request->color;
    $updateproductentry->material = $request->material;
    $updateproductentry->size = $request->size;
    $updateproductentry->description = $request->description;

    if ($request->hasFile('image')) {
        // Delete old image
        if ($updateproductentry->image && file_exists(public_path('image_upload/' . $updateproductentry->image))) {
            unlink(public_path('image_upload/' . $updateproductentry->image));
        }

        // Handle new image
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = rand(11111, 99999) . '.' . $extension;
        $file->move(public_path('image_upload'), $filename);

        // Set new image in model
        $updateproductentry->image = $filename;
    }

    // Save all updates (image and other fields)
    $updateproductentry->save();


    if ($request->hasFile('image1')) 
    {
            // Delete the old image from the storage (if it exists)
            if ($updateproductentry->image1 && file_exists(public_path('image_upload/'.$updateproductentry->image1))) {
                unlink(public_path('image_upload/'.$updateproductentry->image1));
            }

            // Handle the new image
            $file = $request->file('image1');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(11111, 99999) . '.' . $extension;
            $file->move(public_path('image_upload/'), $filename);

            // Update the image field in the database
            $updateproductentry->image1 = $filename;
    }

    if ($request->hasFile('image2')) 
    {
            // Delete the old image from the storage (if it exists)
            if ($updateproductentry->image2 && file_exists(public_path('image_upload/'.$updateproductentry->image2))) {
                unlink(public_path('image_upload/'.$updateproductentry->image2));
            }

            // Handle the new image
            $file = $request->file('image2');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(11111, 99999) . '.' . $extension;
            $file->move(public_path('image_upload/'), $filename);

            // Update the image field in the database
            $updateproductentry->image2 = $filename;
    }

    if ($request->hasFile('image3')) 
    {
            // Delete the old image from the storage (if it exists)
            if ($updateproductentry->image3 && file_exists(public_path('image_upload/'.$updateproductentry->image3))) {
                unlink(public_path('image_upload/'.$updateproductentry->image3));
            }

            // Handle the new image
            $file = $request->file('image3');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(11111, 99999) . '.' . $extension;
            $file->move(public_path('image_upload/'), $filename);

            // Update the image field in the database
            $updateproductentry->image3 = $filename;
    }

    if ($request->hasFile('image4')) 
    {
            // Delete the old image from the storage (if it exists)
            if ($updateproductentry->image4 && file_exists(public_path('image_upload/'.$updateproductentry->image4))) {
                unlink(public_path('image_upload/'.$updateproductentry->image4));
            }

            // Handle the new image
            $file = $request->file('image4');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(11111, 99999) . '.' . $extension;
            $file->move(public_path('image_upload/'), $filename);

            // Update the image field in the database
            $updateproductentry->image4 = $filename;
    }
    $updateproductentry->price = $request->price;
    
    $updateproductentry->save();
    return redirect('productentry')->with('success', 'Data updated successfully.'); 
    }

    public function remove($id){
        $deleteproductentry = productentry::find($id);
        
        if ($deleteproductentry) {
            $deleteproductentry->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }

}