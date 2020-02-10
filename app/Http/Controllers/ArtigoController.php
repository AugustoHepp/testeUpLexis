<?php

namespace App\Http\Controllers;

use App\artigo;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{

   public function index(Request $Request){
    
    $id_usuario = auth()->User()->id;

    $campoBusca = $Request->txtBusca;
    

    $dom = new DOMDocument();

    libxml_use_internal_errors(true);
    $dom->loadHTMLFile('https://uplexis.com.br/category/blog/?s=' . $campoBusca);
    libxml_use_internal_errors(false);
    
    $tags = $dom->getElementsByTagName('a');

    $classname = 'title';
    $finder = new DomXPath($dom);
    $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

    $titulos = array();
    $indice =0;


    foreach ($nodes as $node) 
    {
        if ($node->nodeName != 'h4')
        {
            $titulos[$indice] = $node->nodeValue;
            $indice++;
        }
    }

    $links = array();
    $indice =0;

    foreach ($tags as $tag) {
        
        if ($tag->nodeValue == "Continue Lendo")
        {
            $links[$indice] = $tag->getAttribute('href');
            $indice++;
        }
    }


    if (count($titulos) > 0 ){

        for ($i = 0; $i < count($titulos); $i++){
            echo trim($titulos[$i]) . " " . trim($links[$i]) . "</br>";

            $this->novoArtigo($id_usuario, trim($titulos[$i]), trim($links[$i]));
        }
    }
    else{
        $message = 'Nenhum artigo encontrado';
        return redirect()->back()->with('jsAlert', $message);;
    }
    
    
    $artigos = artigo::where('id_usuario',$id_usuario)->get();

    $colecao = $artigos->ToArray();

    print_r($colecao);

    return view('ResultadoBusca', [
        'artigos' => $colecao,
    ]);

   }

   private function novoArtigo($id_usuario, $titulo, $link){

    $artigo = new artigo();

    $artigo->id_usuario = $id_usuario;
    $artigo->titulo = $titulo;
    $artigo->link = $link;

    $artigo->save();

    }

    public function deletar($id){

        artigo::where('id',$id)->delete();

        $id_usuario = auth()->User()->id;

        $artigos = artigo::where('id_usuario',$id_usuario)->get();

        $colecao = $artigos->attributesToArray();

        return view('ResultadoBusca', [
            'artigos' => $colecao,
        ]);
    }
}
