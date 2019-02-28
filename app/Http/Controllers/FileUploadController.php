<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
	//Fonction d'upload de fichier
    public function uploadFile(Request $fileRequest){

    	if($fileRequest->hasFile("fichier")){
            $fileObject = $fileRequest->file("fichier");

            $fileLink = date("YmdHis",time()).".".$fileObject->getClientOriginalExtension();
            $uploadCode = $fileObject->storeAs('public/documents')

            if($uploadCode){
                return JSONLite::success([$fileLink],"Fichier uploadé avec succès");
            }else{
                return JSONLite::error(null,"Erreur lors de l'upload de l'image");
            }
        }else{
            return JSONLite::error(null,"Erreur lors de l'upload de l'image.Aucune image reçue");
        }

    } 
}
