package com.example.josea.consultasmedicas;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;

/**
 * Created by josea on 26/04/2017.
 */

public class CitaView extends AppCompatActivity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.cita_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbCitas);
        setSupportActionBar(toolbar);
    }
}
