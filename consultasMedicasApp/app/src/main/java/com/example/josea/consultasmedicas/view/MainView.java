package com.example.josea.consultasmedicas.view;

import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.example.josea.consultasmedicas.CRUD.usuario.ReadUser;
import com.example.josea.consultasmedicas.Constantes;
import com.example.josea.consultasmedicas.R;
import com.example.josea.consultasmedicas.util.Sha1;

import java.security.NoSuchAlgorithmException;

import static java.lang.Thread.sleep;

public class MainView extends AppCompatActivity {

    private Button btIniciarSesion , btRegistrarse;
    private EditText etUser, etPassword;
    private AppCompatActivity yo = this;
    private Context context = this;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbMainView);
        setSupportActionBar(toolbar);

        etUser = (EditText) findViewById(R.id.etUs);
        etPassword = (EditText) findViewById(R.id.etPass);

        btIniciarSesion = (Button) findViewById(R.id.btcargaractividad);
        btIniciarSesion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String user = etUser.getText().toString();
                String pass = etPassword.getText().toString();

                ReadUser get = new ReadUser();
                get.execute(user);
                try {
                    sleep(2000);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                try {
                    /*System.out.println(Constantes.user.getPassword());
                    System.out.println(pass);*/
                    if(Constantes.user.getPassword().equals(Sha1.sha1(pass))){
                        startActivity(new Intent(yo, MainActivity.class));
                    }else{

                    }
                } catch (NoSuchAlgorithmException e) {
                    e.printStackTrace();
                }
                //startActivity(new Intent(yo, MainActivity.class));
            }
        });

        btRegistrarse = (Button) findViewById(R.id.btRegistro);
        btRegistrarse.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(yo, UserView.class));
            }
        });
    }
}
