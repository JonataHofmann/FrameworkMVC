<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Candidate;
use App\Model\Phone;

class CandidatesController extends Controller
{

    protected $candidate;
    protected $phone;

    function __construct()
    {
        $this->candidate = new Candidate();
        $this->phone = new Phone();
    }

    function index()
    {
        $candidates = $this->candidate->all();
        dd($candidates);

        $this->view('candidates/index', compact('candidates'));
    }

    function show()
    {
        $candidate = $this->candidate->find($_GET['id']);
        $phones = $candidate->phones();
        $this->view('candidates/show', compact('candidate', 'phones'));
    }

    function create()
    {
        $this->view('candidates/create');
    }

    function store()
    {
        $candidate = $this->candidate->create($_POST['candidate']);
        $candidateField = ['candidate_id'=>$candidate];
        $this->phone->create($_POST['phones']['cel']+ $candidateField);
        $this->phone->create($_POST['phones']['res']+$candidateField);

        redirect('candidates', 'index');
    }

<<<<<<< HEAD
    function destroy($id) {
       // $id = $_GET['id'];
        $this->candidate->destroy($id);
        
        $phonesResult = $this->phone->where('candidate_id',$id);
        foreach($phonesResult as $phone){
=======
    //function destroy($id) { 
    function destroy()
    {
        $id = $_GET['id'];
       /* */
        $phonesResult = $this->phone->where('candidate_id', $id);
        foreach ($phonesResult as $phone) {
>>>>>>> origin
            $this->phone->destroy($phone->id);
        }
        $this->candidate->destroy($id);
        redirect('candidates', 'index');
    }

<<<<<<< HEAD
    function edit($id) {
        //$candidate = $this->candidate->find($_GET['id']);
        $candidate = $this->candidate->find($id);
        $phones = $phones = $candidate->phones();  
        
        $this->view('candidates/edit', compact('candidate','phones'));
    }
    function update($id) {
       // $id = $_GET['id'];
        $this->candidate->update($id,$_POST['candidate']);
=======
    //function edit($id) {
    function edit()
    {
        $candidate = $this->candidate->find($_GET['id']);
        $phones = $candidate->phones();
        $this->view('candidates/edit', compact('candidate', 'phones'));
    }
    //function update($id) {
    function update()
    {
        $id = $_GET['id'];
        $this->candidate->update($id, $_POST['candidate']);
>>>>>>> origin
        $phonesResult = $this->phone->where('candidate_id', $id);
        $candidateField = ['candidate_id'=>$id];
        if ($phonesResult[0] !== null) {
            $this->phone->update($phonesResult[0]->id, $_POST['phones']['cel']);
        } else {
            $this->phone->create($_POST['phones']['cel']+$candidateField);
        }

        if ($phonesResult[1] !== null) {
            $this->phone->update($phonesResult[1]->id, $_POST['phones']['res']);
        } else {
            $this->phone->create($_POST['phones']['res']+$candidateField);
        }
        
        redirect('candidates', 'index');
    }
}
