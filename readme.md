# university_student_portal
University Student Portal is for Students to Signup(Create) themselves. Read/Update/Delete their details as per their wish. This is a basic website for Creating, Reading, Updating & Deletig the Student Records from the MySQL Database using Laravel MVC Framework.

<h2>Techologies Used:</h2> 

<b>Front End Technologies:</b>

1. HTML5
2. CSS
3. Jquery
4. Bootstrap

<b>Back End Technologies:</b>

1. PHP
2. Laravel(MVC Framework)

<h2>Student Sign Up Process:</h2>

We have Created a Student Sign up form on VIEW(welcome.blade.php) using HTML, CSS & Bootstrap.
Form fields that we have used are:

<b>Following fields are provided by HTML 5:</b>

1. Input text field
2. Input email field
3. Input mobile field
4. Input Radio button
5. Input Checkbox field
6. Textarea field
7. Input password field
8. Select field

For View part we have used Bootstrap Front End Framework as follows:

<pre>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</pre>

<h2>CRUD operation on Student Details:</h2>

<h4>Create Student:</h4>
We create a POST Request for student Sign up form. Then, we perfom the following steps:

<b>1. Created a route in web.php as follows:</b>

<pre>
Route::post('/details_save', 'studentdetailcontoller@create');
</pre>

<b>2. Create Laravel Controller using following command.</b>
<pre>
php artisan make:controller studentdetailcontoller
</pre>
This will create a studentdetailcontoller.php file in app\Http\Controllers directory.

<b>3. Create a public function in studentdetailcontoller.</b>

<pre>
    public function create(Request $req) {
    }
</pre>

When user hits this route /details_save , the above function will be executed & form data will be fetched in $req object.

<b>4. Now, Our data is ready in Controller, Lets go & create a Model & Migrations for Database management.</b>

<pre>
php artisan make:model university -m
</pre>

This will create a model in App directory. And Migration will be created in 'database/migrations' directory.

<b>5. For creating a table in Mysql database we create a schema in this migration.</b>

<pre>
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('mobile');
            $table->integer('alternate_mobile');
            $table->string('email');
            $table->string('alternate_email');
            $table->string('gender');
            $table->text('address');
            $table->string('course');
            $table->string('country');
            $table->string('hobbies');
            $table->string('password');
            $table->string('confirm_password');
            $table->timestamps();
        });
</pre>

Here, we define the datatypes of the respective columns in the table.

<b>6. Configure .env file with Database details:</b>

Set the Database values in .env files as :

<pre>
DB_DATABASE=univers
DB_USERNAME=root
DB_PASSWORD=
</pre>

<b>7. Create a table in the MySQL Database by migrating.</b>

<pre>
php artisan migrate
</pre>

This will create a table in the MySQL Database with schema name 'universities'.

Now, our view is ready & Table is ready so let's bridge the gap between them by Eloquent ORM Mapping in the next step.

<b>8. Eloquent ORM Mapping:</b>

We first create an object of the model & save the form data in respective table of that model.

<pre>
    public function create(Request $req) {
        $data = new university();
        $data->name = $req->name;
        $data->mobile = $req->mobile;
        $data->alternate_mobile = $req->alt_mobile;
        $data->email =$req->email;
        $data->alternate_email = $req->alt_email;
        $data->gender = $req->gender;
        $data->address = $req->address; 
        $data->course = $req->course;
        $data->country = $req->country;
        $data->hobbies = implode(',', $req->hobbies);
        $data->password = Hash::make($req->password);
        $data->confirm_password =Hash::make($req->c_password);
        $data->save();
        return redirect('/university_details');
    }
</pre>

This will successfully create a Student record in the 'universities' table.

<b>9. READ the Student Records on the browser:</b>

<pre>
    public function index() {
        $data = university::all();
        return view('home', compact('data'));
    }
</pre>

This will read the data present in the table & return it to the 'home' blade file using compact function.

<b>10. Edit the Student Details:</b>

For editing the User Details we create a seperate blade file where we first return the current info of the Student to which he/she can edit.

Once info is edited Student will submit it & create POST Request as follows:

<pre>
<a class="btn btn-info" href="{{url('/edit_details')}}/{{$val->id}}">Edit</a>
</pre>

On click to this button, we go to the controller & find the record of the student as follows:

<pre>
    public function edit($id) {
        $data = university::find($id);
        // dd($data);   
        $hobbies = explode(',', $data->hobbies);
        return view('update',compact('data' ,'hobbies'));   
    }
</pre>

Returned it to the View Part which is a seperate update.blade.php file.
Now, user edits the info & saves it to the database for which we create a seperate POST request as follows:

<pre>
    public function update(Request $req , $id) {
        $data = university::find($id);
        // dd($data);
        $data->name = $req->name;
        $data->mobile = $req->mobile;
        $data->alternate_mobile = $req->alt_mobile;
        $data->email =$req->email;
        $data->alternate_email = $req->alt_email;
        $data->gender = $req->gender;
        $data->address = $req->address; 
        $data->course = $req->course;
        $data->country = $req->country;
        $data->hobbies = implode(',', $req->hobbies);
        $data->password = Hash::make($req->password);
        $data->confirm_password =Hash::make($req->c_password);
        $data->save();
        return redirect('/university_details');
    }  
    
 This will first find the record of the student using passed '$id' & then save Updated info to that Student's record only.
 </pre>
 
 <b>11. Delete the Student Detail:</b>
 
 Let's now delete the Student detail, first we need to create a route for the Delete Request as follows:
 
 <pre>
 <a class="btn btn-danger" href="{{url('/delete_details')}}/{{$val->id}}">Delete</a>
</pre>

Finding the Student record using '$id' & then apply delete() method of Eloquent ORM on it.

<pre>
    public function destroy($id) {
        $data = university::find($id);
        // dd($data);
        $data->delete();
        return redirect('/university_details');
    }
</pre>

This will delete the Student Record from the 'universities' table of which we have passed the '$id'.

Thus, we have Successfully developed a basic website using MVC of Laravel framework for University Student's to manage their inotmation.

<b>Thanks for Reading !! :)</b>
