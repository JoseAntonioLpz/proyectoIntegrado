package com.example.josea.consultasmedicas;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.josea.consultasmedicas.pojo.Cita;

import java.util.List;

/**
 * Created by josea on 24/05/2017.
 */

public class AdaptadorCitas extends RecyclerView.Adapter<AdaptadorCitas.MyViewHolder>{
    private List<Cita> citas;

    public AdaptadorCitas(List<Cita> citas) {
        this.citas = citas;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.item, parent, false);

        return new MyViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, int position) {
        Cita cita = citas.get(position);
        holder.id.setText(Integer.toString(cita.getId()));
        holder.fecha.setText(cita.getFecha().toString());
        holder.type.setText(cita.getType());
        holder.reason.setText(cita.getReason());
    }

    @Override
    public int getItemCount() {
        return citas.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView id, fecha, type, reason;

        public MyViewHolder(View view) {
            super(view);
            id = (TextView) view.findViewById(R.id.tvId);
            fecha = (TextView) view.findViewById(R.id.tvFecha);
            type = (TextView) view.findViewById(R.id.tvType);
            reason = (TextView) view.findViewById(R.id.tvReason);
        }
    }
}
