package com.example.josea.consultasmedicas.view;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.os.Parcelable;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;
import android.widget.Toast;

import com.example.josea.consultasmedicas.CRUD.cita.DeleteCita;
import com.example.josea.consultasmedicas.CRUD.cita.ReadCita;
import com.example.josea.consultasmedicas.CRUD.usuario.DeleteUser;
import com.example.josea.consultasmedicas.util.Constantes;
import com.example.josea.consultasmedicas.pojo.Usuario;
import com.example.josea.consultasmedicas.view.recycler.AdaptadorCitas;
import com.example.josea.consultasmedicas.view.recycler.DividerItemDecoration;
import com.example.josea.consultasmedicas.R;
import com.example.josea.consultasmedicas.view.recycler.RecyclerTouchListener;
import com.example.josea.consultasmedicas.pojo.Cita;

import java.util.ArrayList;
import java.util.List;

import static java.lang.Thread.sleep;

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    private AppCompatActivity yo = this;
    private Context context = this;

    public static List<Cita> citas = new ArrayList<>();
    //private List<Cita> citas = new ArrayList<>();
    private RecyclerView recyclerView;
    private TextView tvUserName;
    //public static AdaptadorCitas adaptador;
    private AdaptadorCitas adaptador;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        recyclerView = (RecyclerView) findViewById(R.id.recycler_view);
        tvUserName = (TextView) findViewById(R.id.tvUserName);
        //tvUserName.setText(Constantes.user.getFirstName() + Constantes.user.getLastName());
        adaptador = new AdaptadorCitas(citas);

        recyclerView.setHasFixedSize(true);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(getApplicationContext());
        recyclerView.setLayoutManager(mLayoutManager);
        recyclerView.addItemDecoration(new DividerItemDecoration(this, LinearLayoutManager.VERTICAL));
        recyclerView.setItemAnimator(new DefaultItemAnimator());
        recyclerView.setAdapter(adaptador);

        recyclerView.addOnItemTouchListener(new RecyclerTouchListener(getApplicationContext(), recyclerView, new RecyclerTouchListener.ClickListener() {
            @Override
            public void onClick(View view, int position) {
                Cita cita = citas.get(position);
                Intent i = new Intent(yo, CitaViewUpdate.class);
                i.putExtra("cita", cita);
                startActivity(i);
            }

            @Override
            public void onLongClick(View view, int position) {
                Cita cita = citas.get(position);
                DeleteCita delete = new DeleteCita();
                delete.execute(cita.getId());
                Toast.makeText(getApplicationContext(), cita.getId() + " is eliminated!", Toast.LENGTH_SHORT).show();
                citas.remove(position);
                adaptador.notifyDataSetChanged();
            }
        }));

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();*/
                startActivity(new Intent(yo, CitaView.class));
            }
        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        citas.clear();
        try {
            cargarCitas();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.cerrarSesion) {
            startActivity(new Intent(yo, MainView.class));
            return true;
        }
        if (id == R.id.ayuda) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.btEditUser) {
            /*Constantes.user.setLastName("perico");
            UpdateUser update = new UpdateUser();
            update.execute();*/
            startActivity(new Intent(yo, UserViewUpdate.class));
        } else if (id == R.id.btDeleteUser) {
            DeleteUser delete = new DeleteUser();
            Toast.makeText(getApplicationContext(), Constantes.user.getSeguridadSocial() + " is eliminated!", Toast.LENGTH_SHORT).show();
            delete.execute(Constantes.user.getSeguridadSocial());
            Constantes.user = new Usuario();
            startActivity(new Intent(yo, MainView.class));
        }/*else if (id == R.id.nav_slideshow) {

        } else if (id == R.id.nav_manage) {

        } else if (id == R.id.nav_share) {

        } else if (id == R.id.nav_send) {

        }*/

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    private void cargarCitas() throws InterruptedException {
        ReadCita get = new ReadCita();
        get.execute();
        sleep(2000);
        adaptador.notifyDataSetChanged();
    }
}
