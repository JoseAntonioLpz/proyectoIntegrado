package com.example.josea.consultasmedicas.CRUD.usuario;

import android.os.AsyncTask;
import android.util.Log;

import com.example.josea.consultasmedicas.util.Constantes;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpDelete;
import org.apache.http.impl.client.DefaultHttpClient;

/**
 * Created by josea on 30/05/2017.
 */

public class DeleteUser extends AsyncTask<String, Integer, Boolean> {
    @Override
    protected Boolean doInBackground(String... params) {
        HttpClient httpClient = new DefaultHttpClient();

        HttpDelete del = new HttpDelete(Constantes.URL + "usuario/" + params[0]);

        del.setHeader("content-type", "application/json");

        try {
            HttpResponse resp = httpClient.execute(del);
            return true;
        }
        catch(Exception ex)
        {
            Log.e("ServicioRest","Error!", ex);
            return false;
        }
    }
}
