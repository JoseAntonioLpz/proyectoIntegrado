package com.example.josea.consultasmedicas.CRUD.usuario;

import android.os.AsyncTask;
import android.util.Log;

import com.example.josea.consultasmedicas.Constantes;
import com.example.josea.consultasmedicas.util.Conversor;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONObject;

/**
 * Created by josea on 30/05/2017.
 */

public class ReadUser extends AsyncTask<String, Integer, Boolean>{
    @Override
    protected Boolean doInBackground(String... params) {
        boolean ress = true;
        HttpClient httpClient = new DefaultHttpClient();

        String seguridadSocial = params[0];

        HttpGet del = new HttpGet(Constantes.URL + "usuario/" + seguridadSocial);

        del.setHeader("content-type", "application/json");

        try
        {
            HttpResponse resp = httpClient.execute(del);
            String respStr = EntityUtils.toString(resp.getEntity());

            JSONObject respJSON = new JSONObject(respStr);
            Constantes.user = Conversor.userFromJson(respJSON.toString());
        }
        catch(Exception ex)
        {
            ress = false;
            Log.e("ServicioRest","Error!", ex);
        }
        return ress;
    }
}
