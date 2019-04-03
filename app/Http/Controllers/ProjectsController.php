<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Gate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            //returning the list off all projects own by logged in user
       // $projects= Project::where('user_id',Auth::user()->id)->get();  //Admin creator 
        $users = User::find(Auth::user()->id);

        //to do user view 
     //   $project_id = ProjectUser::where('project_id',Auth::user()->id)->get();


        return view('projects.index', ['users'=>$users]);

        }

        return view('auth.login');
 }


    public function adduser(Request $request){
         //add user to projects 

         //take a project, add a user to it
         $project = Project::find($request->input('project_id'));

        

         $user = User::where('email', $request->input('email'))->first(); //single record

         //check if user is already added to the project
         $projectUser = ProjectUser::where('user_id',$user->id)
                                    ->where('project_id',$project->id)
                                    ->first();
                                    
            if($projectUser){
                //if user already exists, exit 
        
                return response()->json(['success' ,  $request->input('email').' is already a member of this project']); 
               
            }


            if($user && $project){

                $project->users()->attach($user->id); 

                     return response()->json(['success' ,  $request->input('email').' was added to the project successfully']); 
                        
                    }
                    

         return redirect()->route('projects.show', ['project'=> $project->id])
         ->with('errors' ,  'Error adding user to project');
        

         
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $company_id = null )
     {
         //

         $companies = null;
         if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
         }
 
         return view('projects.create',['company_id'=>$company_id, 'companies'=>$companies]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
         //
 
         if(Auth::check()){
             $project = Project::create([
                 'name' => $request->input('name'),
                 'description' => $request->input('description'),
                 'company_id' => $request->input('company_id')
             ]);
 
 
             if($project){
                $projectUser = ProjectUser::create([
                 'project_id' => $project->id,
                 'user_id' => Auth::user()->id
             ]);
                 return redirect()->route('projects.show', ['project'=> $project->id])
                 ->with('success' , 'project created successfully');

             }
 
         }
         
             return back()->withInput()->with('errors', 'Error creating new project');
 
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // returning the projects view (projects.show) where the id is in the variable $project
        //$project = Project::where('id',$project)->first();
        
        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', ['project'=>$project, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // fectch the data to be edited and pass it to the edit form view (projects.cdit)
        $project = Project::find($project->id);
        return view('projects.edit', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        //save data (update where the id = recieved id (project.if))
        $projectUpdate = Project::where('id', $project->id)
                            ->update([
                                'name'=> request()->input('name'),
                                'description'=> request()->input('description'),
                            ]);

        //check update is successfull or not and view Success massege
        if($projectUpdate){
            return redirect()->route('projects.show',['project'=> $project->id])->with('success','project Updated Successfully');
        }
        //if no successfuland redirect 
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //todo: need to check if user has athority to delete access control
        //
        $findproject = Project::find($project->id);

        //check if the call is delete 
        if($findproject->delete()){
            //redirect
            return redirect()->route('projects.index')
            ->with('success','project Deleted Successfully');
        }
        //if not successfull
        return back()->withInput()->with('error', 'project Could Not be Deleted');
        
    }
}
