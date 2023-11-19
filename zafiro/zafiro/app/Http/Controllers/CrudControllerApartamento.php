<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudControllerApartamento extends Controller
{
    /*    public function index(){
        $datos=DB::select("SELECT * FROM apartamentos A JOIN usuarios U ON A.id_usuario = U.id_usuarios");
        $datos2=DB::select("SELECT id_usuarios ,nombre FROM usuarios ");
        return view("welcome")->with("datos", $datos);


    }
*/

    public function index()
    {
        $datos = DB::select("SELECT * FROM apartamentos A JOIN usuarios U ON A.id_usuario = U.id_usuarios");
        $datos2 = DB::select("SELECT id_usuarios ,nombre FROM usuarios ");
        return view('apartamentos', [
            'datos' => $datos,
            'datos2' => $datos2,
        ]);
    }



    public function create(Request $request)
    {
        //$datos=DB::select("SELECT * FROM apartamentos A JOIN usuarios U ON A.id_usuario = U.id_usuarios");
        try {
            $sql = DB::insert("insert into apartamentos(numero,bloque,piso,id_usuario) values(?,?,?,?) ", [
                $request->txtnapartamento,
                $request->txtbapartamento,
                $request->txtnpiso,
                $request->nombres
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Apartamento registrado correctamente");
        } else {
            return back()->with("incorrecto", "Registro incorrecto de apartamento");
        }
    }


    public function update(Request $request)
    {
        try {
            $sql = DB::update("update apartamentos set numero=?, bloque =?, piso =?, id_usuario=? where id_apartamento=?", [
                $request->txtnapartamento,
                $request->txtbapartamento,
                $request->txtnpiso,
                $request->nombres,
                $request->modificar

            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Apartamento modificado correctamente");
        } else {
            return back()->with("incorrecto", "Modificacion incorrecta de apartamento");
        }
    }


    public function delete($id)
    {

        try {
            $sql = DB::delete("delete from apartamentos where id_apartamento=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Apartamento eliminado Correctamente");
        } else {
            return back()->with("incorrecto", "Apartamento eliminado Incorrectamente");
        }
    }

    /********************funciones usuario**********************/

    public function usuariosre()
    {
        $datos3 = DB::select("SELECT * FROM usuarios");

        return view('usuarios', [
            'datos3' => $datos3

        ]);
    }



    public function createuser(Request $request)
    {
        //$datos=DB::select("SELECT * FROM apartamentos A JOIN usuarios U ON A.id_usuario = U.id_usuarios");
        try {
            $sql = DB::insert("insert into usuarios (nombre,id_deuda) values(?,'0') ", [
                $request->txtnuser
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Usuario registrado Correctamente");
        } else {
            return back()->with("incorrecto", "Registro incorrecto de Usuario");
        }
    }


    public function updateuser(Request $request)
    {
        try {
            $sql = DB::update("update usuarios set nombre=? where id_usuarios=?", [
                $request->txtnusuario,
                $request->modificar
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Usuario modificado correctamente");
        } else {
            return back()->with("incorrecto", "Modificacion incorrecta de Usuario");
        }
    }



    public function deleteuser($id)
    {

        try {
            $sql = DB::delete("delete from usuarios where id_usuarios=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Usuario eliminado Correctamente");
        } else {
            return back()->with("incorrecto", "Usuario eliminado Incorrectamente");
        }
    }


    /********************funciones pagos**********************/


    public function usuariospagos()
    {
        $datos4 = DB::select("SELECT * FROM usuarios U JOIN pagos P ON U.id_usuarios = P.id_usuarios");
        $datos2 = DB::select("SELECT id_usuarios ,nombre FROM usuarios ");
        return view('pagos', [
            'datos4' => $datos4,
            'datos2' => $datos2

        ]);
    }





    public function updatepagos(Request $request)
    {
        try {
            $sql = DB::update("update pagos set valor_pagado=? where id_pagos=?", [
                $request->txtvalorpagado,
                $request->modificar
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Pago modificado correctamente");
        } else {
            return back()->with("incorrecto", "Modificacion incorrecta de Pago");
        }
    }


    public function deletepagos($id)
    {

        try {
            $sql = DB::delete("delete from pagos where id_pagos=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Pago eliminado Correctamente");
        } else {
            return back()->with("incorrecto", "Pago eliminado Incorrectamente");
        }
    }


    public function createpagos(Request $request)
    {
        try {
            $sql = DB::insert("insert into pagos (valor_pagado,fecha,id_usuarios) values(?,?,?) ", [
                $request->txtvalorpago,
                $request->txtfechapago,
                $request->nombres
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Usuario registrado Correctamente");
        } else {
            return back()->with("incorrecto", "Registro incorrecto de Usuario");
        }
    }



    /********************funciones Deudas**********************/


    public function usuariosdeudas()
    {
        $datos4 = DB::select("SELECT * FROM usuarios U JOIN deudas D ON U.id_usuarios = D.id_usuarios");
        $datos2 = DB::select("SELECT id_usuarios ,nombre FROM usuarios ");
        return view('deudas', [
            'datos4' => $datos4,
            'datos2' => $datos2

        ]);
    }





    public function updatedeudas(Request $request)
    {
        try {
            $sql = DB::update("update deudas set valor_deuda=? where id_deudas=?", [
                $request->txtvalorpagado,
                $request->modificar
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Deuda modificada correctamente");
        } else {
            return back()->with("incorrecto", "Modificacion incorrecta de Deuda");
        }
    }


    public function deletedeudas($id)
    {

        try {
            $sql = DB::delete("delete from deudas where id_deudas=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Deuda eliminada Correctamente");
        } else {
            return back()->with("incorrecto", "Deuda eliminada Incorrectamente");
        }
    }


    public function createdeudas(Request $request)
    {
        try {
            $sql = DB::insert("insert into deudas (valor_deuda,fecha,id_usuarios) values(?,?,?) ", [
                $request->txtvalordeuda,
                $request->txtfechadeuda,
                $request->nombres
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == true) {
            return back()->with("correcto", "Deuda registrado Correctamente");
        } else {
            return back()->with("incorrecto", "Registro incorrecto de Deuda");
        }
    }




















}
