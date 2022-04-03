<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use \App\Mail\SendMail;
class clientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function accueil(){
        return view('pages.connexion_inscription');
     }






    public function index()
    {
        $clients=Client::withTrashed()->paginate(5);
       // $clients = Client::all();
      //  $clients = Client::paginate(5);
        return view('pages.index', compact('clients'));
       // return view('pages.connexion_inscription');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('pages.create');
}
public function store(Request $request)
{
    // $request->validate([
    //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    //   ]);
      $imageName="";
    //   dd($request->file('photo'));
      if ($request->file()) {
          $imagePath = $request->file('photo');
          $imageName = $imagePath->getClientOriginalName();
          $path = $request->file('photo')->storeAs('uploads', $imageName, 'public');
        }
// dd($imageName);
    $client=new \App\Client;
    $client->nom=$request->nom;
    $client->prenom=$request->prenom;
    $client->solde=$request->solde;
    $client->cni=$request->cni;
    $client->date_naissance=$request->date_naissance;
    $client->lieu_naissance=$request->lieu_naissance;
    $client->sexe=$request->sexe;
    $client->profession=$request->profession;
    $client->photo=$imageName;
    $client->telephone=$request->telephone;
    $client->email=$request->email;
    $client->mdp=$request->mdp;
   //Tache::create($request->all());
   $client->save();
//    $mail= new \App\Http\Controllers\MailSend;
//    $mail->MailSend();


    return redirect()->route('client.index')->with('info', 'Le client a bien été créé');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $transactions= \DB::select('select * from transactions where id_client ='.$client->id);
        return view('pages.show', compact('client','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Client::find($id);
        return view('pages.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client=Client::find($id);
        $client->update($request->all());


        return redirect()->route('client.index')->with('info','super modification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return back()->with('info', 'Le compte  client a bien été mis dans la corbeille.');
    }

    public function ajouter($id){
        /*
        pour creer ajout on recupere l'id entrer dans le formulaire puis on le passe en parametre
        dans web.php
        */
        $client=Client::find($id);
        $solde=$client->solde;

return view('pages.ajout')->with('client',$client);
      //dd($solde);

    }

    public function retraits($id){
        /*
        pour creer ajout on recupere l'id entrer dans le formulaire puis on le passe en parametre
        dans web.php
        */
        $client=Client::find($id);
        $solde=$client->solde;

return view('pages.retrait')->with('client',$client);
      //dd($solde);

    }

    public function ajout(Request $request){
        $client=Client::find($request->id);
        if($request->montant<0){
            return back()->with('info','impossible de faire entrer un montant negative');
        }
        else{
            $solde=$client->solde+$request->montant;
           // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
           \DB::table('transactions')->insert(["id_client"=>$client->id,"type_operation"=>"depot",'solde_initial'=>$client->solde,'solde_final'=>$solde,'montant'=>$request->montant,'created_at'=>now()]);
           $client->update(['solde'=>$solde]);
            return redirect()->route('client.index')->with('info','depot sur le compte de'.$client->nom);

        }
    }

        public function retrait(Request $request){
            $client=Client::find($request->id);
            if($request->montant<0 ){
                return back()->with('info','impossible de faire entrer un montant negative');
            }
            else{
                $solde=$client->solde-$request->montant;
               // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
               \DB::table('transactions')->insert(["id_client"=>$client->id,
               "type_operation"=>"retrait",
               'solde_initial'=>$client->solde,
               'solde_final'=>$solde,
               'montant'=>$request->montant,
               'created_at'=>now()]);
               $client->update(['solde'=>$solde]);
                return redirect()->route('client.index')->with('info','super modification du solde');

            }



    }

    public function verifier(request $request){



        if (Client::where('telephone', $request->telephone)->exists() && Client::where('mdp',$request->mdp)->exists()) {

        //    $clients= \DB::select('select * from clients where telephone ='.$request->telephone )->first();
       $clients= \DB::table('clients')->get()->where('telephone',$request->telephone)
       ->where('mdp',$request->mdp)->first();
 //dd($clients);
$id=intval(['id'=>$clients->id]);

           $transactions= \DB::select('select * from transactions where id_client ='.$clients->id);
          // dd($transactions);

                // return r('pages.client_donne',compact('clients','transactions'));
                return redirect()->route("client.information", $clients->id);#->with(['clients'=>$clients,'transactions'=>$transactions]);

         }
         else{
            return redirect()->route('pages.accueil')->with('info','veuillez saisir des identifiants corrects');
         }
    }

    public function lolipop($id){
       $clients= \DB::table('clients')->get()->where('id',$id)->first();

        $transactions= \DB::select('select * from transactions where id_client ='.$clients->id);

        return view('pages.client_donne')->with(['clients'=>$clients,'transactions'=>$transactions]);
    }

    public function insertion(request $request){
        // \DB::insert('insert into clients (nom,prenom,cni,date_naissance,lieu_naissance,profession,sexe,photo,email,telephone,solde,mdp) values ($request->nom,$request->prenom,$request->cni,$request->date_naissance,$request->lieu_naissance,$request->profession,
        // $request->sexe,$request->photo,$request->email,$request->solde,$request->mdp)');
        $imageName="";
        //   dd($request->file('photo'));
          if ($request->file()) {
            //   dd($request->file());
              $imagePath = $request->file('photo');
              $imageName = $imagePath->getClientOriginalName();
              $path = $request->file('photo')->storeAs('uploads', $imageName, 'public');
            }

        \DB::table('clients')->insert(["nom"=>$request->nom,
        "prenom"=>$request->prenom,
        'cni'=>$request->cni,
        'date_naissance'=>$request->date_naissance,
        'lieu_naissance'=>$request->lieu_naissance,
        'profession'=>$request->profession,
        'sexe'=>$request->sexe,
        'photo'=>$request->photo=$imageName,
        'email'=>$request->email,
        'telephone'=>$request->telephone,
        'solde'=>0,
         'mdp'=>$request->mdp,
        'created_at'=>now()]);
        $this->mailsend($request->email, $request->nom);
    //    \app\Http\Controllers\clientController\mailsend();
        return view('pages.connexion_inscription');

    }


    public function virer($id){
        /*
        pour creer ajout on recupere l'id entrer dans le formulaire puis on le passe en parametre
        dans web.php
        */
        // dd("kk");
        $client=Client::find($id);
        $solde=$client->solde;

return view('pages.virement')->with('client',$client);
    // public function virement(request $request){
    //     if(Client::where('telephone', $request->destinataire)->exists() ){
    //         $request->montant;
    //         dd($request->montant);
    //     }

    }

    public function virement(request $request){
        /*
        pour creer ajout on recupere l'id entrer dans le formulaire puis on le passe en parametre
        dans web.php
        */


  // $client=Client::find($id);
        // $solde=$client->solde;


         if(Client::where('telephone', $request->destinataire)->exists() ){

            $clients= Client::find($request->id);
           $reste= intval($clients->solde) - intval($request->montant);
        //    dd($reste);
           $r=\DB::table('clients')->where('id',$request->id)->update(['solde'=>$reste]);
        //    dd($r);

        //    $client->update(['solde'=>$reste]);
           $dest=Client::where('telephone', $request->destinataire)->get()->first();
           $dest->update(['solde'=>$request->montant+$dest->solde]);
        //    dd($client->solde);
            //  dd($clients);
           $transactions= \DB::select('select * from transactions where id_client ='.$clients->id);
           return redirect()->route("client.information", $clients->id)->with('info','vous venez d effectuez un virement');
            // return redirect()->route("client.verifier")->with(['clients'=>$clients,'transactions'=>$transactions]);
        }

    }

    public function mailsend($email,$nom){

        $details=[
            'nom'=>$nom,
            'title'=>'Title:mail  from Prunelle&Sahore@corp',
            'body'=>'body: ce mail atteste que vous etes inscrit a notre banque'

        ];
       // \DB::select('select email from client where id_client ='.$clients->id);
    //    $clients= \DB::table('clients')->latest('id')->first();
      // dd($clients->email);
        \Mail::to($email)->send(new SendMail($details));
        return view('pages.thanks');
    }


    public function forceDestroy($id)
{
    Client::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

    return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
}

public function restore($id)
{
    Client::withTrashed()->whereId($id)->firstOrFail()->restore();

    return back()->with('info', 'Le film a bien été restauré.');
}
}
