package com.example.josea.consultasmedicas.CRUD.usuario;

import android.os.AsyncTask;
import android.util.Log;

import com.example.josea.consultasmedicas.Constantes;
import com.example.josea.consultasmedicas.pojo.Usuario;
import com.example.josea.consultasmedicas.util.Conversor;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONObject;

/**
 * Created by josea on 30/05/2017.
 */

public class InsertarUser extends AsyncTask<Usuario, Integer, Boolean>{
    @Override
    protected Boolean doInBackground(Usuario... params) {
        boolean ress = true;

        HttpClient httpClient = new DefaultHttpClient();

        HttpPost post = new
                HttpPost(Constantes.URL + "usuario");

        post.setHeader("content-type", "application/json");
        try
        {
            JSONObject dato = Conversor.userToJson(params[0]);

            StringEntity entity = new StringEntity(dato.toString());
            post.setEntity(entity);

            HttpResponse resp = httpClient.execute(post);
            String respStr = EntityUtils.toString(resp.getEntity());

            if(!respStr.equals("true"))
                ress = false;
        }
        catch(Exception ex)
        {
            Log.e("ServicioRest","Error!", ex);
            ress = false;
        }

        return ress;
    }

}
