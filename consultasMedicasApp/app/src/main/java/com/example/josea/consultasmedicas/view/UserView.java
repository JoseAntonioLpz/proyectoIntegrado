package com.example.josea.consultasmedicas.view;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;


import com.example.josea.consultasmedicas.CRUD.usuario.InsertarUser;
import com.example.josea.consultasmedicas.R;
import com.example.josea.consultasmedicas.pojo.Usuario;
import com.example.josea.consultasmedicas.util.Sha1;

import java.security.NoSuchAlgorithmException;

/**
 * Created by josea on 29/05/2017.
 */

public class UserView extends AppCompatActivity {

    private AppCompatActivity yo = this;
    private Context context = this;

    private EditText etSeguridadSocial, etNombre, etApellidos, etPass, etPassRepeat;
    private Button btAceptar, btCancelar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.user_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbUser);
        setSupportActionBar(toolbar);

        etSeguridadSocial = (EditText) findViewById(R.id.etSSocial);
        etNombre = (EditText) findViewById(R.id.etFirstName);
        etApellidos = (EditText) findViewById(R.id.etLastName);
        etPass = (EditText) findViewById(R.id.etPassword);
        etPassRepeat = (EditText) findViewById(R.id.etPasswordRepeat);

        btAceptar = (Button) findViewById(R.id.btAceptarUser);
        btCancelar = (Button) findViewById(R.id.btCancelarUser);

        btAceptar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Usuario u = new Usuario();
                 if(etPass.getText().toString().equals(etPassRepeat.getText().toString())){
                     u.setSeguridadSocial(etSeguridadSocial.getText().toString());
                     u.setFirstName(etNombre.getText().toString());
                     u.setLastName(etApellidos.getText().toString());
                     try {
                         u.setPassword(Sha1.sha1(etPass.getText().toString()));
                     } catch (NoSuchAlgorithmException e) {
                         e.printStackTrace();
                     }
                     InsertarUser post = new InsertarUser();
                     post.execute(u);
                     startActivity(new Intent(yo , MainView.class));
                 }else{
                     Log.v("Pass" , "Pass not equal");
                 }
            }
        });

        btCancelar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

            }
        });
    }
}
