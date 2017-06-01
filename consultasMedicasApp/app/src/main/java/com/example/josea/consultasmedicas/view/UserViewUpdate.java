package com.example.josea.consultasmedicas.view;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.josea.consultasmedicas.CRUD.usuario.UpdateUser;
import com.example.josea.consultasmedicas.R;
import com.example.josea.consultasmedicas.util.Constantes;
import com.example.josea.consultasmedicas.util.Sha1;

import java.security.NoSuchAlgorithmException;

import static java.lang.Thread.sleep;

/**
 * Created by josea on 01/06/2017.
 */

public class UserViewUpdate extends AppCompatActivity {

    private AppCompatActivity yo = this;
    private Context context = this;

    private Button aceptar, cancelar;
    private EditText nombre, apellidos, contraseña;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.update_user_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbUserUpdate);
        setSupportActionBar(toolbar);

        nombre = (EditText) findViewById(R.id.etFirstNameUsUpd);
        nombre.setText(Constantes.user.getFirstName());
        apellidos = (EditText) findViewById(R.id.etLastNameUsUpd);
        apellidos.setText(Constantes.user.getLastName());
        contraseña = (EditText) findViewById(R.id.etPassUsUpd);

        aceptar = (Button) findViewById(R.id.btAcUserUpdate);
        aceptar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Constantes.user.setFirstName(nombre.getText().toString());
                Constantes.user.setLastName(apellidos.getText().toString());
                if(!contraseña.getText().toString().equals("")){
                    try {
                        Constantes.user.setPassword(Sha1.sha1(contraseña.getText().toString()));
                    } catch (NoSuchAlgorithmException e) {
                        e.printStackTrace();
                    }
                }
                UpdateUser update = new UpdateUser();
                update.execute();
                try {
                    sleep(1500);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                Toast.makeText(getApplicationContext(), "¡Usuario Actualizado!", Toast.LENGTH_SHORT).show();
                startActivity(new Intent(yo, MainActivity.class));
            }
        });
        cancelar = (Button) findViewById(R.id.btCanUserUpdate);
        cancelar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(yo, MainActivity.class));
            }
        });
    }
}
