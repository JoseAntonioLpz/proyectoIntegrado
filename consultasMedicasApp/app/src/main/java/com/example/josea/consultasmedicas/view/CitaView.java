package com.example.josea.consultasmedicas.view;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.example.josea.consultasmedicas.util.Constantes;
import com.example.josea.consultasmedicas.R;
import com.example.josea.consultasmedicas.CRUD.cita.InsertarCita;
import com.example.josea.consultasmedicas.pojo.Cita;

import java.util.Date;

/**
 * Created by josea on 26/04/2017.
 */

public class CitaView extends AppCompatActivity {

    private AppCompatActivity yo = this;
    private Context context = this;

    private Button btAceptar;
    private Button btCancelar;
    private EditText etSeguridadSocial;
    private EditText etTelephone;
    private EditText etFecha;
    private EditText etType;
    private EditText etReason;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.cita_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbCitas);
        setSupportActionBar(toolbar);

        etSeguridadSocial = (EditText) findViewById(R.id.etSeguridadSocial);
        etTelephone = (EditText) findViewById(R.id.etTelephone);
        etFecha = (EditText) findViewById(R.id.etFecha);
        etType = (EditText) findViewById(R.id.etType);
        etReason = (EditText) findViewById(R.id.etReason);

        btAceptar = (Button) findViewById(R.id.btAceptar);
        btCancelar = (Button) findViewById(R.id.btCancelar);

        cargarDatos();

        btAceptar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String seguridadSocial = etSeguridadSocial.getText().toString();
                String telephone = etTelephone.getText().toString();
                String fecha = etFecha.getText().toString();
                String type = etType.getText().toString();
                String reason = etReason.getText().toString();

                Cita c = new Cita(3,seguridadSocial,type,reason,telephone,new Date());

                InsertarCita post = new InsertarCita();
                post.execute(c);
                startActivity(new Intent(yo , MainActivity.class));

            }
        });

        btCancelar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(yo , MainActivity.class));
            }
        });
    }

    private void cargarDatos(){
        if(Constantes.user != null){
            etSeguridadSocial.setText(Constantes.user.getSeguridadSocial());
        }
    }
}
