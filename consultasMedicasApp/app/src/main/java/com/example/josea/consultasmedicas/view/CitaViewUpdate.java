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

import com.example.josea.consultasmedicas.CRUD.cita.UpdateCita;
import com.example.josea.consultasmedicas.R;
import com.example.josea.consultasmedicas.pojo.Cita;
import com.example.josea.consultasmedicas.util.UtilFecha;


import static java.lang.Thread.sleep;

/**
 * Created by josea on 01/06/2017.
 */

public class CitaViewUpdate extends AppCompatActivity {

    private AppCompatActivity yo = this;
    private Context context = this;

    private Button aceptar, cancelar;
    private EditText telefono, fecha, type, reason;
    private Cita cita = new Cita();

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.update_cita_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbCitasUpdate);
        setSupportActionBar(toolbar);

        if (savedInstanceState != null) {
            cita = savedInstanceState.getParcelable("cita");
        }else {
            Bundle b = getIntent().getExtras();
            if(b != null ) {
                cita = b.getParcelable("cita");
            }
        }
        telefono = (EditText) findViewById(R.id.etTelephoneUpCita);
        telefono.setText(cita.getTelephone());
        fecha = (EditText) findViewById(R.id.etFechaUpdCita);
        Log.v("FECHA3: " , cita.getFecha().toString());
        fecha.setText(UtilFecha.formatStringDate("dd/MM/yyyy" , cita.getFecha()));
        type = (EditText) findViewById(R.id.etTypeUpCita);
        type.setText(cita.getType());
        reason = (EditText) findViewById(R.id.etReasonUpCita);
        reason.setText(cita.getReason());

        aceptar = (Button) findViewById(R.id.btAcepUpCita);
        aceptar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cita.setTelephone(telefono.getText().toString());
                cita.setType(type.getText().toString());
                cita.setReason(reason.getText().toString());
                cita.setFecha(UtilFecha.stringToDate(fecha.getText().toString()));
                UpdateCita update = new UpdateCita();
                update.execute(cita);
                try {
                    sleep(1500);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                startActivity(new Intent(yo, MainActivity.class));
            }
        });
        cancelar = (Button) findViewById(R.id.btCanUpCita);
        cancelar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(yo, MainActivity.class));
            }
        });
    }
}
