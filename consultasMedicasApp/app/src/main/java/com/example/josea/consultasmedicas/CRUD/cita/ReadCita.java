package com.example.josea.consultasmedicas.CRUD.cita;

import android.os.AsyncTask;
import android.util.Log;

import com.example.josea.consultasmedicas.util.Constantes;
import com.example.josea.consultasmedicas.pojo.Cita;
import com.example.josea.consultasmedicas.util.Conversor;
import com.example.josea.consultasmedicas.view.MainActivity;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONObject;

/**
 * Created by josea on 30/05/2017.
 */

public class ReadCita extends AsyncTask<String, Integer, Boolean>{

    @Override
    protected Boolean doInBackground(String... params) {
        HttpClient httpClient = new DefaultHttpClient();

        HttpGet get = new HttpGet(Constantes.URL + "cita/" + Constantes.user.getSeguridadSocial());

        get.setHeader("content-type", "application/json");

        try {
            HttpResponse resp = httpClient.execute(get);
            String respStr = EntityUtils.toString(resp.getEntity());

            JSONArray respJSON = new JSONArray(respStr);


            for(int i=0; i<respJSON.length(); i++)
            {
                JSONObject obj = respJSON.getJSONObject(i);
                Cita c = Conversor.citaFromJson(obj.toString());
                MainActivity.citas.add(c);
            }
            return true;
        }catch(Exception ex) {
            Log.e("ServicioRest","Error!", ex);
            return false;
        }

    }
}
