package com.example.josea.consultasmedicas.CRUD.usuario;

import android.os.AsyncTask;
import android.util.Log;

import com.example.josea.consultasmedicas.Constantes;
import com.example.josea.consultasmedicas.util.Conversor;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPut;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONObject;

/**
 * Created by josea on 30/05/2017.
 */

public class UpdateUser extends AsyncTask<Integer, Integer, Boolean> {
    @Override
    protected Boolean doInBackground(Integer... params) {
        HttpClient httpClient = new DefaultHttpClient();

        HttpPut put = new HttpPut(Constantes.URL + "usuario/" + Constantes.user.getId());
        put.setHeader("content-type", "application/json");

        try{
            JSONObject dato = Conversor.userToJson(Constantes.user);

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
