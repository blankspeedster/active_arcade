using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ArrowRotator : MonoBehaviour
{
    public Vector3 _rotation;
    public float _speed;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        transform.Rotate(_rotation * _speed * Time.deltaTime);
    }
}
