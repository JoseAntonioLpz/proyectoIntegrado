package com.example.josea.consultasmedicas.CRUD.cita;

import android.os.AsyncTask;
import android.util.Log;

import com.example.josea.consultasmedicas.Constantes;
import com.example.josea.consultasmedicas.pojo.Cita;
import com.example.josea.consultasmedicas.util.Conversor;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPut;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONObject;

/**
 * Created by josea on 30/05/2017.
 */

public class UpdateCita extends AsyncTask<Cita, Integer, Boolean>{
    @Override
    protected Boolean doInBackground(Cita... params) {
        HttpClient httpClient = new DefaultHttpClient();

        HttpPut put = new HttpPut(Constantes.URL + "citas/id/" + params[0].getId());
        put.setHeader("content-type", "application/json");

        try{
            JSONObject dato = Conversor.citaToJson(params[0]);

            StringEntity entity = new StringEntity(dato.toString());
            put.setEntity(entity);
            HttpResponse resp = httpClient.execute(put);
            return true;
        }catch(Exception ex){
            Log.e("ServicioRest","Error!", ex);
            return false;
        }
    }
}
