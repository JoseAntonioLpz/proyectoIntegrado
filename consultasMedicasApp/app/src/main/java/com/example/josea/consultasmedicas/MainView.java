package com.example.josea.consultasmedicas;

import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;

public class MainView extends AppCompatActivity {

    private Button bt;
    private AppCompatActivity yo = this;
    private Context context = this;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main_view);
        Toolbar toolbar = (Toolbar) findViewById(R.id.tbMainView);
        setSupportActionBar(toolbar);

        bt = (Button) findViewById(R.id.btcargaractividad);
        bt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(yo, MainActivity.class));
            }
        });
    }
}
